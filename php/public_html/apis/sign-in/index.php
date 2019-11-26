<?php

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";

use VeteranResource\Resource\{User, Category, Resource, Useful};
use phpDocumentor\Reflection\Types\Resource_;

/**
 * api for signing in
 *
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {

	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_status();
	}
	//grab the MySQL connection
	$secrets = new \Secrets("/etc/apache2/capstone-mysql/veteran.ini");
	$pdo = $secrets->getPdoObject();

	//determine which HTTP method is being used.
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//if method is POST handle sign-in
	if($method === "POST") {
		//make sure the XSRF Token is valid
		verifyXsrf();
		//process the request content and decode the json object into a php object
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);
		//check to make sure the password and username field is not empty.s
		if(empty($requestObject->userUsername) === true) {
			throw(new \InvalidArgumentException("Please provide your username", 401));
		} else {
			$userEmail = filter_var($requestObject->userUsername, FILTER_SANITIZE_STRING);
		}

		if(empty($requestObject->userPassword) === true) {
			throw(new \InvalidArgumentException("Please enter a password", 401));
		} else {
			$userPassword = $requestObject->userPassword;
		}

		//grab the profile from the database with the email
		$user = User::getUserByUserUsername($pdo, $userUsername);
		if(empty($user) === true) {
			throw(new InvalidArgumentException("Invalid Username", 401));
		}
		$user->setUserActivationToken('null');
		$user->update($pdo);

		//verify hash is correct
		if(password_verify($requestObject->userPassword, $user->getUserHash()) === false) {
			throw(new \InvalidArgumentException("Password or Username is incorrect.", 401));
		}

		//grab user from database and put into session
		$user = User::getUserByUserId($pdo, $user->getUserId());

		$_SESSION["user"] = $user;

		//create authentincation payload
		$authObject = (object)[
			"userId" => $user->getUserId(),
			"userUsername" => $user->getUserUsername()
		];
		//create JWT TOKEN
		setJwtAndAuthHeader("auth", $authObject);

		$reply->message = "Sign in was successful.";
	} else {
		throw(new \InvalidArgumentException("Invalid HTTP method request", 418));
	}
	//catch exceptions
} catch(Exception | TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
header("Content-type: application/json");
echo json_encode($reply);
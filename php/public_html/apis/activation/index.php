<?php
require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");

use VeteranResource\Resource\User;

/**
 * API to check profile activation status
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */
// Check the session. If it is not active, start the session.
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
try {
	//grab the mySQL connection
	$secrets = new \Secrets("/etc/apache2/capstone-mysql/veteran.ini");
	$pdo = $secrets->getPdoObject();

	//determine what http method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$activation = filter_input(INPUT_GET, "activation", FILTER_SANITIZE_STRING);

	//make sure activation token is the correct size
	if(strlen($activation) !== 32) {
		throw(new InvalidArgumentException("Activation Token has incorrect length.", 405));
	}

	//verify that the activation token is a string value of hexadecimal
	if(ctype_xdigit($activation) === false) {
		throw(new \InvalidArgumentException("Activation is empty or has non hexadecimal contents", 405));
	}

	//handle the GET HTTP request
	if($method === "GET") {
		//set xsrf token
		setXsrfCookie();

		//find profile associated with activation token
		$user = User::getUserByUserActivationToken($pdo, $activation);

		//verify the profile is not null
		if($user !==null) {

			//make sure the activation token matches
			if($activation === $user->getUserActivationToken()) {

				//set activation to null
				$user->setUserActivationToken(null);

				//update the user in the database
				$user->update($pdo);

				//set the reply for the end user
				$reply->data = "Thank you for registering your account, you will be automatically redirected to the home page shortly.";
			}
		} else{
			//throw an exception if the token doesn't exist
			throw(new RuntimeException("Profile with this activation token does not exist.", 304));
		}
	} else {
		//throw an exception if the HTTP request is not a GET
		throw(new InvalidArgumentException("Invalid HTTP request method.", 405));
	}

	//update the reply status and message state variables if an exception or type error was thrown
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->data = $exception->getMessage();
}catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->status = $typeError->getMessage();
}

//prepare and send the reply
header("Content-type: application/json");
if($reply->data === null){
	unset($reply->data);
}
echo json_encode($reply);
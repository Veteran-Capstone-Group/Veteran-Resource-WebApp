<?php

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";

use VeteranResource\Resource\User;


/**
 * api for signing-up as a user
 *
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */

//verify session
if(session_start() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//connect to mySQL
	$secrets = new \Secrets("/etc/apache2/capstone-mysql/veteran.ini");
	$pdo = $secrets->getPdoObject();

	//determine what http method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	if($method === "POST") {
		//decode the json and turn it into a php object
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);

		//user Email is a required field
		if(empty($requestObject->userEmail) === true) {
			throw(new \InvalidArgumentException ("No email entered.", 405));
		}

		//verify password is there
		if(empty($requestObject->userPassword) === true) {
			throw(new \InvalidArgumentException("A valid password is required.", 405));
		}

		//verify that confirm password is there
		if(empty($requestObject->userPasswordConfirm) === true) {
			throw(new \InvalidArgumentException("Please confirm your password.", 405));
		}

		//user Name is a required field
		if(empty($requestObject->userName) === true) {
			throw(new \InvalidArgumentException ("No name entered.", 405));
		}

		//user Username is a required field
		if(empty($requestObject->userUsername) === true) {
			throw(new \InvalidArgumentException ("No username entered.", 405));
		}

		//make sure userPassword and userPasswordConfirm match
		if(($requestObject->userPassword) !== ($requestObject->userPasswordConfirm)) {
			throw(new \InvalidArgumentException ("Passwords entered do not match!", 405));
		}

		//hash password for storage
		$hash = password_hash($requestObject->userPassword, PASSWORD_ARGON2I, ["time_cost" => 384]);

		//create activation token information
		$userActivationToken = bin2hex(random_bytes(16));

		//create the user object and prepare to insert it into the database
		$user = new User(generateUuidV4(), $userActivationToken, $requestObject->userEmail, $hash, $requestObject->userName, $requestObject->userUsername);

		//insert user into database
		$user->insert($pdo);

		//compose email to send out the activation token
		$messageSubject = "Please follow the link to confirm your email address and complete setting up your profile.";

		//build the activation link that will be included in the email.
		//make sure url is public_html/api/activation/$activation
		$basePath = dirname($_SERVER["SCRIPT_NAME"], 3);

		//create path
		$urlGlue = $basePath . "/apis/activation/activation=" . $userActivationToken;

		//create the redirect link
		$confirmLink = "https://" . _SERVER["SERVER_NAME"] . $urlGlue;

		//compose message to send with email
		$message = <<< EOF
<h2>Welcome to the Albuquerque Veteran Resource Application!</h2>
<br>
<p>Once you have clicked the link below you will have successfully signed up with the Albuquerque Veteran Resource Application! Our mission is to increase awareness of tools that Albuquerque Veterans can use. You are a vital part of this mission! By signing up, usefulling the resources you find beneficial, and contributing information about resources that you know of, you are helping men and women who have served our nation. Thank you for joining us, we hope you find our site useful!</p>
<br>
<p><a href = "$confirmLink">$confirmLink</a></p>
<br>
<br>
<p>Thank you again!</p>
<p>Veteran Resource Application Team</p>
EOF;
		//create swift email
		$swiftMessage = new Swift_Message();
		//attach sender to message
		//this takes the form of an associative array where the email is keyed to a real name
		//todo: when URL is purchased, replace with new valid email
		$swiftMessage->setFrom(["replaceThis@email.com" => "With Valid Email"]);

		/**
		 * attach recipient to the message
		 * this includes the recipient's real name, as that helps reduce possibility of email being marked as spam
		 */
		//define recipient
	}

} catch() {

}

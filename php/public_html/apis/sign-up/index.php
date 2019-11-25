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
if(session_status() !== PHP_SESSION_ACTIVE) {
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
		$confirmLink = "https://" . $_SERVER["SERVER_NAME"] . $urlGlue;

		//compose message to send with email
		$message = <<< EOF
<h2>Welcome to the Albuquerque Veteran Resource Application!</h2>
<br>
<p>Hello $requestObject->userName,</p>
<p>Once you have clicked the link below you will have successfully signed up with the Albuquerque Veteran Resource 
Application! Our mission is to increase awareness of tools that Albuquerque Veterans can use. You are a vital part of 
this mission! By signing up, indicating the resources you find useful, and contributing information about resources 
that you know of, you are helping men and women who have served our nation. Thank you $requestObject->userName for 
joining us, we hope you find our site useful!</p>
<p><a href = "$confirmLink">$confirmLink</a></p>
<p>Thank you again!</p>
<p>Veteran Resource Application Team</p>
EOF;
		//create swift email
		$swiftMessage = new Swift_Message();
		//attach sender to message
		//this takes the form of an associative array where the email is keyed to a real name
		$swiftMessage->setFrom(["Admin@ABQVet.org" => "ABQ Veteran Resources"]);

		/**
		 * attach recipient to the message
		 * this includes the recipient's real name, as that helps reduce possibility of email being marked as spam
		 */
		//define recipient
		$recipient = [$requestObject->userEmail => $requestObject->userName];

		//set recipient to the swift message
		$swiftMessage->setTo($recipient);

		//attach the subject line to the swift message
		$swiftMessage->setSubject($messageSubject);

		/**
		 * attach message to the email.
		 * set two versions of the message: an html formatted version and a filter_var()ed version aka plain text.
		 * this tactic displays the url as plaintext for users not viewing html content
		 */
		//attach html version for the message
		$swiftMessage->setBody($message, "text/html");

		//attach plain text version
		$swiftMessage->addPart(html_entity_decode($message), "text/plain");

		/**
		 * send the Email via SMTP; the SMTP server is configured to relay everything upstream via CNM and may or may not
		 * be available with all hosts; SwiftMailer supports many different transport methods; SMTP was chosen because
		 * it's the most compatible and has the best error handling
		 * @see http://swiftmailer.org/docs/sending.html Sending Messages - Documentation - SwitftMailer
		 * todo: look at the documentation for our server host to see if this configuration works
		 */
		//setup smtp
		$smtp = new Swift_SmtpTransport("localhost", 25);
		$mailer = new Swift_Mailer($smtp);

		//send the message
		$numSent = $mailer->send($swiftMessage, $failedRecipients);

		/**
		 * the send method returns the number of recipients that accepted the email, so create an exception if the number
		 * sent doesn't equal the number accepted.
		 */
		if($numSent !== count($recipient)) {
			throw(new RuntimeException("Unable to send email to " . $failedRecipients[0] . "."));
		}

		//update reply
		$reply->message = "Thank you for creating a profile with the Albuquerque Veteran Resource Application!";
	} else {
		throw(new InvalidArgumentException("Invalid http request"));
	}

} catch(\Exception | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	$reply->trace = $exception->getTraceAsString();
}

header("Content-type: application/json");
echo json_encode($reply);
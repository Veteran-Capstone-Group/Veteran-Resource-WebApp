<?php

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";

use VeteranResource\Resource\{User};
use phpDocumentor\Reflection\Types\Resource_;

/**
 * api for user
 *
 * @author Timothy Beck <Dev@timothyBeck.com>
 */
//verify session, start session if session doesn't exist
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_status();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//grab the MySQL connection
	$secrets = new \Secrets("/etc/apache2/capstone-mysql/veteran.ini");
	$pdo = $secrets->getPdoObject();

	//determine which HTTP method was used
	$method = $_SERVER["HTTP_X_HTTP_METHOD"] ?? $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$userId = filter_input(INPUT_GET, "userId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userActivationToken = filter_input(INPUT_GET, "userActivationToken", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userEmail = filter_input(INPUT_GET, "userEmail", FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userHash = filter_input(INPUT_GET, "userHash", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userName = filter_input(INPUT_GET, "userName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userUsername = filter_input(INPUT_GET, "userUsername", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	if(($method === "DELETE" || $method === "PUT") && (empty($userId) === true)) {
		throw(new InvalidArgumentException("id can not be empty", 402));
	}

	if($method === "GET") {
		//set xsrf cookie
		setXsrfCookie();

		if(empty($userUsername) === false) {
			//get user using userUsername
			$reply->data = User::getUserByUserUsername($pdo, $userUsername);
		} elseif(empty($userId) === false) {
			//get user by user Id
			$reply->data = User::getUserByUserId($pdo, $userId);
		} elseif(empty($userActivationToken) === false) {
			$reply->data = User::getUserByUserActivationToken($pdo, $userActivationToken);
		}  else {
			throw (new InvalidArgumentException("Input Required", 400));
		}
	} elseif($method == "PUT") {
		//enforce xsrf token
		verifyXsrf();

		//make sure user is siged in
		if(empty($_SESSION["user"]) === true) {
			throw(new \InvalidArgumentException("You must be signed in to post a resource, please sign in to continue.", 401));
		}

		//enforce that the user has a JWT token
		validateJwtHeader();

		//retrieve json package that was sent by the user and store it in in a variable using file_get_contents
		$requestContent = file_get_contents("php://input");

		//Decodes content and stores result in $requestContent
		$requestObject = json_decode($requestContent);

		//retrieve user to be updated
		$user = User::getUserByUserId($pdo, $userId);
		if($user === null) {
			throw(new RuntimeException("Profile does not exist", 404));
		}

		//makes sure required fields are available
		if(empty($requestObject->userEmail) === true) {
			$requestObject->userEmail = $user->getUserEmail();
		}
		if(empty($requestObject->userName) === true) {
			$requestObject->userName = $user->getUserName();
		}
		//user username | if null use username from MySQL
		if(empty($requestObject->userUsername) === true) {
			$requestObject->userUsername = $user->getUserUsername();
		}

		$user->setUserEmail($requestObject->userEmail);
		$user->setUserUsername($requestObject->userUsername);
		$user->setUserName($requestObject->userName);
		$user->update($pdo);

		//update reply
		$reply->message = "Your User information has been updated";

		//enforce that the user is signed in
		if(empty($_SESSION["user"]) === true) {
			throw(new \InvalidArgumentException("you must be logged in to post Resources", 403));
		}



	} elseif($method === "DELETE") {

		//verify the XSRF Token
		verifyXsrf();

		//retrieve user to be deleted
		$user = User::getUserByUserId($pdo, $userId);
		if($user === null) {
			throw(new RuntimeException("Profile does not exist", 404));
		}

		//make sure user is siged in
		if(empty($_SESSION["user"]) === true || $_SESSION["user"]->getUserId()->toString() !== $user->getUserId()->toString()) {
			throw(new \InvalidArgumentException("You must be signed in to delete yourself, please sign in to continue.", 401));
		}

		//enforce that the user has a JWT token
		validateJwtHeader();

		//retrieve json package that was sent by the user and store it in in a variable using file_get_contents
		$requestContent = file_get_contents("php://input");

		//Decodes content and stores result in $requestContent
		$requestObject = json_decode($requestContent);

		//delete the user from the database
		$user->delete($pdo);
		$reply->message = "User Deleted";

	} else {
		throw (new InvalidArgumentException("Invalid HTTP request", 400));
	}
//catch any exceptions that were thrown
} catch(\Exception | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}
// encode and return reply to front end caller
echo json_encode($reply);


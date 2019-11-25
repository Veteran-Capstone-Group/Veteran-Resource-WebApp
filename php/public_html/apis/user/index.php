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
	//this does stuff
	$userActivationToken = filter_input(INPUT_GET, "userActivationToken", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userEmail = filter_input(INPUT_GET, "userEmail", FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userHash = filter_input(INPUT_GET, "userHash", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userName = filter_input(INPUT_GET, "userName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$userUsername = filter_input(INPUT_GET, "userUsername", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	if(($method === "DELETE" || $method === "PUT") && (empty($userId) === true)) {
		throw(new InvalidArgumentException("id caan not be empty", 402));
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

	}
}


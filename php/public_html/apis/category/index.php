<?php

require_once dirname(__DIR__, 3)."/vendor/autoload.php";
require_once dirname(__DIR__, 3)."/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3)."/lib/xsrf.php";
require_once dirname(__DIR__, 3)."/lib/jwt.php";
require_once dirname(__DIR__, 3)."/lib/uuid.php";

use VeteranResource\Resource\{Category};

/**
 * api for category
 *
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */
//verify the session, start if inactive
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

	//determine which HTTP method was used
	$method = $_SERVER["HTTP_X_HTTP_METHOD"] ?? $_SERVER["REQUEST_METHOD"];
	 //sanitize input
	$categoryId = filter_input(INPUT_GET, "categoryId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	//todo check if we need to know that id needs to be valid for get method

	if ($method === "GET") {
		//set the xsrf cookie
		setXsrfCookie();

		//Check if an id is passed
		if(empty($categoryId)=== false) {
			$reply->data = Category::getCategoryByCategoryId($pdo, $categoryId);
		}
	} else {
		throw (new InvalidArgumentException("Invalid HTTP method request", 405));
	}

	//update the $reply->status $reply->message
} catch (\Exception | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}

// encode and return reply to front end caller
header("Content-type: application/json");
echo json_encode($reply);

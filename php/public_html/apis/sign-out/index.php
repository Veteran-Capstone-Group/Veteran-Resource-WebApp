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
 * api for signing out
 *
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_status();
}

//prepare a null reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];
	if($method === "GET") {
		$_SESSION = [];
		$reply->message = "You are now signed out.";
	}
	else {
		throw (new \InvalidArgumentException("Invalid HTTP method request"));
	} //determine what kind of error was thrown
} catch(\Exception | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}
//echo reply to front end
echo json_encode($reply);
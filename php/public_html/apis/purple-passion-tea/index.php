<?php
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
use VeteranResource\Resource\User;
try {
	//verify the HTTP method being used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];
	// if the HTTP method is head check/start the PHP session and set the XSRF token
	if($method === "GET") {
		if(session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		setXsrfCookie();
		$reply->message = "Tea ready with hints of hibiscus, orange peel, rose hips & passion fruit flavors.";
	} else {
		throw (new \InvalidArgumentException("Attempting to brew coffee with a teapot, use a french press instead", 418));
	}
} catch(\Exception  | \TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
header("Content-Type: application/json");
// encode and return reply to front end caller
echo json_encode($reply);
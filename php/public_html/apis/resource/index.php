<?php

require_once dirname(__DIR__, 3)."/vendor/autoload.php";
require_once dirname(__DIR__, 3)."/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3)."/lib/xrsf.php";
require_once dirname(__DIR__, 3)."/lib/jwt.php";
require_once dirname(__DIR__, 3)."/lib/uuid.php";

use VeteranResource\Resource\{Category, Resource, User};

/**
 * api for resource
 *
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */
//verify the session, start a session if inactive
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
	$resourceId = filter_input(INPUT_GET, "resourceId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$resourceCategoryId = filter_input(INPUT_GET, "resourceCategoryId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$resourceUserId = filter_input(INPUT_GET, "resourceUserId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	if($method === "GET"){
		//set xsrf cookie
		setXsrfCookie();


		if(empty($resourceId) === false) {
			//get resource using resourceId
			$reply->data = Resource::getResourceByResourceId($pdo, $resourceId);
		} elseif( empty($resourceCategoryId) === false) {
			//get resource using resourceCategoryId
			$reply->data = Resource::getResourceByResourceCategoryId($pdo, $resourceCategoryId);
		} elseif(empty($resourceUserId)===false) {
			//get a resource using resourceUserId
			$reply->data = Resource::getResourceByResourceUserId($pdo, $resourceUserId);
		} else {
			throw (new InvalidArgumentException("Input Required", 400));
		}

	} elseif($method === "POST") {
		//enforce xsrf token
		verifyXsrf();
		//make sure user is signed in
		if(empty($_SESSION["user"])=== true) {
			throw(new \InvalidArgumentException("You must be signed in to post a resource, please sign in to continue.", 401));
		}

		//retrieves JSON package that was sent by the user and stores it in $requestContent using file_get_contents
		$requestContent = file_get_contents("php://input");

		//Decodes content and stores result in $requestContent
		$requestContent = json_decode($requestContent);


	} else {
		throw (new InvalidArgumentException("Invalid HTTP method request", 405));
	}
	//update the $reply->status $reply->message
} catch (\Exception|\TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
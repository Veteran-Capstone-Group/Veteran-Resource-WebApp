<?php

require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";

use VeteranResource\Resource\{Category, Resource, User};
use phpDocumentor\Reflection\Types\Resource_;

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

	//check if resource is empty and method is delete or put
	if(($method === "DELETE" || $method === "PUT") && (empty($resourceId) === true)) {
		throw(new InvalidArgumentException("id can not be empty", 402));
	}

	if($method === "GET") {
		//set xsrf cookie
		setXsrfCookie();

		if(empty($resourceId) === false) {
			//get resource using resourceId
			$reply->data = Resource::getResourceByResourceId($pdo, $resourceId);
		} elseif(empty($resourceCategoryId) === false) {
			//get resource using resourceCategoryId
			$reply->data = Resource::getResourceByResourceCategoryId($pdo, $resourceCategoryId)->toArray();
		} elseif(empty($resourceUserId) === false) {
			//get a resource using resourceUserId
			$reply->data = Resource::getResourceByResourceUserId($pdo, $resourceUserId);
		} else {
			throw (new InvalidArgumentException("Input Required", 400));
		}

	} elseif($method === "POST") {
		//enforce xsrf token
		verifyXsrf();
		//make sure user is signed in
		if(empty($_SESSION["user"]) === true) {
			throw(new \InvalidArgumentException("You must be signed in to post a resource, please sign in to continue.", 401));
		}

		//retrieves JSON package that was sent by the user and stores it in $requestContent using file_get_contents
		$requestContent = file_get_contents("php://input");

		//Decodes content and stores result in $requestContent
		$requestObject = json_decode($requestContent);

		//makes sure required fields other than resourceId are available
		if(empty($requestObject->resourceCategoryId) === true) {
			throw(new \InvalidArgumentException("The Category field is empty.", 405));
		}
		if(empty($requestObject->resourceDescription) === true) {
			throw(new \InvalidArgumentException("The Description field is empty.", 405));
		}
		if(empty($requestObject->resourceTitle) === true) {
			throw(new \InvalidArgumentException("The Title field is empty.", 405));
		}
		if(empty($requestObject->resourceUrl) === true) {
			throw(new \InvalidArgumentException("The Url field is empty.", 405));
		}

		//enforce that the user is signed in
		if(empty($_SESSION["user"]) === true) {
			throw(new \InvalidArgumentException("you must be logged in to post Resources", 403));
		}

		//enforce that the user has a JWT token
		validateJwtHeader();

		//create new resource and insert it into the database
		$resource = new Resource(generateUuidV4(), $requestObject->resourceCategoryId, $_SESSION["user"]->getUserId(), $requestObject->resourceAddress, false, $requestObject->resourceDescription, $requestObject->resourceEmail, $requestObject->resourceImageUrl, $requestObject->resourceOrganization, $requestObject->resourcePhone, $requestObject->resourceTitle, $requestObject->resourceUrl);
		$resource->insert($pdo);

		//update reply
		$reply->message = "Resource created! Thank you for helping out Albuquerque's Veterans!";
	}  else {
		throw (new InvalidArgumentException("Invalid HTTP method request", 405));
	}
	//update the $reply->status $reply->message
} catch(\Exception|\TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
header("Content-type: application/json");
echo json_encode($reply);
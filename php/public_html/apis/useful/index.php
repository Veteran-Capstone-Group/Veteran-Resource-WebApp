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
 * api for usefuls
 *
 * @author Timothy Beck <Dev@TimothyBeck.com>
 */
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
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

	//sanitize search parameters
	$usefulUserId = filter_input(INPUT_GET, "usefulUserId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$usefulResourceId = filter_input(INPUT_GET, "usefulResourceId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//get a count of usefuls on resource by usefulResourceId
		if ($usefulResourceId !== null) {
			$useful = Useful::getUsefulByUsefulResourceId($pdo, $usefulResourceId)->toArray();

			//return count
			if($useful !== null) {
				$reply->data = $useful;
			}

			//if search parameters aren't met scream at user
		} elseif(empty($usefulResourceId) !== true) {
			throw (new InvalidArgumentException("incorrect search parameters", 404));
		}
	} elseif ($method === "POST" || $method === "PUT") {

		//decode the response from the front end
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);

		if(empty($requestObject->usefulUserId) === true) {
			throw (new \InvalidArgumentException("No User for this Useful", 405));
		}

		if(empty($requestObject->usefulResourceId) === true) {
			throw (new \InvalidArgumentException("No Resource for this Useful", 405));
		}

		if($method === "POST") {
			//enforce that the end user has a XSRF token.
			verifyXsrf();

			// enforce the user is signed in
			if(empty($_SESSION["user"]) === true) {
				throw(new \InvalidArgumentException("you must be logged in to useful resources", 403));
			}

			validateJwtHeader();

			$useful = new Useful($requestObject->usefulResourceId, $_SESSION["user"]->getUserId());
			$useful->insert($pdo);
			$reply->message = "Resource has been Useful'd";
		} elseif($method === "PUT") {
			//enforce the end user has a XSRF token.
			verifyXsrf();

			//enforce the end user has a JWT token
			validateJwtHeader();


			//get useful to delete by composite id
			$useful = Useful::getUsefulByUsefulResourceIdAndUsefulUserId($pdo, $requestObject->usefulResourceId, $requestObject->usefulUserId);
			if($useful === null) {
				throw (new RuntimeException("Useful Does Not Exist", 404));
			}

			//USER NEEDS TO BE SIGNED IN
			if(empty($_SESSION["user"]) === true || $_SESSION["user"]->getUserId()->toString() !== $requestObject->usefulUserId) {
				throw(new \InvalidArgumentException("You must be signed in to delete your useful", 401));
			}

			//delete useful
			$useful->delete($pdo);

			//update message
			$reply->message = "Useful has been deleted.";
		}
		// if any other HTTP request is sent throw an exception
	} else {
		throw new \InvalidArgumentException("invalid http request", 405);
	}
	//catch any exceptions that is thrown and update the reply status and message
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

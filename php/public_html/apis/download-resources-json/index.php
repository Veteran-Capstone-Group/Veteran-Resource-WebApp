<?php

use VeteranResource\Resource\Resource;


require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/lib/jwt.php";
require_once dirname(__DIR__, 3) . "/lib/uuid.php";


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

	if($method === "GET") {
		//set xsrf cookie
		setXsrfCookie();
		//get all resources
			$reply->data = Resource::getAllResources($pdo);

	}
	//update the $reply->status $reply->message
} catch(\Exception|\TypeError $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
}
header('Content-Disposition: attachment; filename="Veteran-Resources-JSON.txt"');
echo json_encode($reply);
	?>


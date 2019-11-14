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
if(session_start() !== PHP_SESSION_ACTIVE) {
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
		if(empty($requestObject->profileAtHandle) === true) {
			throw(new \InvalidArgumentException ("No profile @handle", 405));
		}
		//verify password is there

		//verify that confirm password is there

		//user Name is a required field

		//user Username is a required field
	}

} catch() {

}

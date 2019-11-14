<?php
require_once dirname(__DIR__, 3) . "/vendor/autoload.php";
require_once dirname(__DIR__, 3) . "/Classes/autoload.php";
require_once dirname(__DIR__, 3) . "/lib/xsrf.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");

use VeteranResource\Resource\User;

/**
 * API to check profile activation status
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */
// Check the session. If it is not active, start the session.
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

	//determine what http method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$activation = filter_input(INPUT_GET, "activation", FILTER_SANITIZE_STRING);

	//make sure activation token is the correct size
	if(strlen($activation) !== 32) {
		throw(new InvalidArgumentException("Activation Token has incorrect length.", 405));
	}

	//verify that the activation token is a string value of hexadecimal
	if(ctype_xdigit($activation) === false) {
		throw(new \InvalidArgumentException("activation is empty or has non hexadecimal contents", 405));
	}

	//handle the GET HTTP request
	if($method === "GET") {
		setXsrfCookie();

	}
}
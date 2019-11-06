<?php

require_once dirname(__DIR__, 3)."/vendor/autoload.php";
require_once dirname(__DIR__, 3)."/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3)."/lib/xrsf.php";
require_once dirname(__DIR__, 3)."/lib/jwt.php";
require_once dirname(__DIR__, 3)."/lib/uuid.php";

use VeteranResource\Resource\{Category};

/**
 * api for the category test
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


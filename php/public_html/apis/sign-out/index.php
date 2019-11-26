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
	session_status();
}


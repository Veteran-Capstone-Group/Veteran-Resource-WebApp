<?php

require_once dirname(__DIR__, 3)."/vendor/autoload.php";
require_once dirname(__DIR__, 3)."/Classes/autoload.php";
require_once("/etc/apache2/capstone-mysql/Secrets.php");
require_once dirname(__DIR__, 3)."/lib/xrsf.php";
require_once dirname(__DIR__, 3)."/lib/jwt.php";
require_once dirname(__DIR__, 3)."/lib/uuid.php";

use VeteranResource\Resource\{Category, Resource, User};


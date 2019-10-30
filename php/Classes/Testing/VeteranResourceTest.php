<?php

namespace VeteranResource\Resource;

Use PHPUnit\Framework\TestCase;
Use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\DataSet\QueryDataSet;
use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\Operation\{Composite, Factory, Operation};

// grab the encrypted properties file
require_once("/etc/apache2/capstone-mysql/Secret.php");

require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");


/**
 * Abstract Class containing universal and project specific mySQL parameters
 *
 * This class is designed to lay out the foundation for our Veteran Resource App unit tests. It loads all of the database parameters so class specific tests can have their parameters in one place.
 *
 * IMPORTANT: Tables must be added in the order they were created!
 *
 * @author John Johnson-Rodgers <john@johnthe.dev
 */

//todo Modify DataDesignTest::getDataSet to include our tables

//todo Modify DataDesignTest::getConnection() to include our mySQL property files.

//todo Have table specific tests included in this class
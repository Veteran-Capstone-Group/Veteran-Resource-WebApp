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

abstract class VeteranResourceTest extends TestCase {
	use TestCaseTrait;

	/**
	 * PHPUnit Connection Interface
	 * @var  Connection $connection
	 */
	protected $connection = null;

	/**
	  * Assembles table from schema and provides it to PHPUnit
	  *
	  * @return QueryDataSet assembled schema for PHPUnit
	  */
	public final function getDataSet() : QueryDataSet {
		$dataset = new QueryDataSet($this->getConnection());

		//all tables go here IN THE ORDER THEY ARE CREATED
		//user Needs second parameter because user is a reserved word in mySql
		$dataset->addTable("user", "SELECT userId, userActivationToken, userEmail, userHash, userName, userUsername FROM 'user'");
		//category
		$dataset->addTable("category");
		//resource
		$dataset->addTable("resource");
		//useful
		$dataset->addTable("useful");
		return($dataset);
	}


}
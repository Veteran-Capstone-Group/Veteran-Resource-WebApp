<?php

namespace VeteranResource\Resource;

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\DataSet\QueryDataSet;
use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\Operation\{Composite, Factory, Operation};

// grab the encrypted properties file
require_once("/etc/apache2/capstone-mysql/Secrets.php");
//grab the class we're testing
require_once (dirname(__DIR__, 1) . "/autoload.php");

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");


/**
 * Abstract Class containing universal and project specific mySQL parameters
 *
 * This class is designed to lay out the foundation for our Veteran Resource App unit tests. It loads all of the database parameters so class specific tests can have their parameters in one place.
 *
 * IMPORTANT: Tables must be added in the order they were created!
 *
 ** @see https://bootcamp-coders.cnm.edu/class-materials/unit-testing/phpunit/ to check if written correctly
 *
 * @author John Johnson-Rodgers <john@johnthe.dev
 */
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
	public final function getDataSet(): QueryDataSet {
		$dataset = new QueryDataSet($this->getConnection());

		//all tables go here IN THE ORDER THEY ARE CREATED
		//user Needs second parameter because user is a reserved word in mySql
		$dataset->addTable("user", "SELECT userId, userActivationToken, userEmail, userHash, userName, userUsername FROM user");
		//category
		$dataset->addTable("category");
		//resource
		$dataset->addTable("resource");
		//useful
		$dataset->addTable("useful");
		return ($dataset);
	}

	/**
	 * templates the setup method that runs before every test; this expunges the database before each run
	 *
	 * @see https://phpunit.de/manual/current/en/fixtures.html#fixtures.more-setup-than-teardown PHPUnit Fixtures: setUp and tearDown
	 * @see https://github.com/sebastianbergmann/dbunit/issues/37 TRUNCATE fails on tables which have foreign key constraints
	 * @return Composite array containing delete and insert commands
	 */
	public final function getSetUpOperation(): Composite {
		return new Composite([
			Factory::DELETE_ALL(),
			Factory::INSERT()
		]);
	}

	/**
	 *templates the teardown method that runs after every test, this method expunges the database after every run
	 *
	 * @return Operation delete command for the database
	 */
	public final function getTearDownOperation(): Operation {
		return (Factory::DELETE_ALL());
	}

	/**
	 * Sets up database connection for PHPUnit
	 *
	 * @see <https://phpunit.de/manual/current/en/database.html#database.configuration-of-a-phpunit-database-testcase>
	 * @return Connection PHPUnit database connection interface
	 */
	public final function getConnection(): Connection {
		//if the connection hasn't been established, create it
		if($this->connection === null) {
			// connect to mySQL and provide the interface for PHPUnit
			$secrets = new \Secrets("/etc/apache2/capstone-mysql/veteran.ini");
			$pdo = $secrets->getPdoObject();
			$this->connection = $this->createDefaultDBConnection($pdo, $secrets->getDatabase());
		}
		return ($this->connection);
	}

	/**
	 * returns the actual PDO object, it is a convenience method
	 *
	 * @return \PDO active PDO object
	 */
	public final function getPDO() {
		return ($this->getConnection()->getConnection());
	}

}
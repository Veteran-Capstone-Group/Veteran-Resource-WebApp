<?php


namespace VeteranResource\Resource\Test;

use VeteranResource\Resource\{Category, Resource, User, Useful};

//obtain Class for testing
require_once(dirname(__DIR__) . "/Test/VeteranResourceTest.php");
//obtain required dependencies for testing
require_once(dirname(__DIR__, 2) . "/Classes/autoload.php");
//grab Uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/**
 * PHPUnit test for Class Useful
 *
 * This is a Unit test for the Useful class. it tests all getters/setters, construct, getFooByBar methods, PDO methods,
 * and MySQL connection for valid and invalid inputs
 *
 * @package VeteranResource\Resource
 * @see Useful
 * @author Timothy Beck <barricuda1993@yahoo.com>
 */
class UsefulTest extends VeteranResourceTest {

	/**
	 * Category that's required for resources this is for foreign key relations
	 * @var Category $category
	 */
	protected $category;

	/**
	 * User that's required for resources this is for foreign key relations
	 * @var User $user
	 */
	protected $user;

	/**
	 * Resource that's required for Useful, this is for foreign key relations
	 * @var Resource $resource
	 */
	protected $resource;
	/**
	 * valid hash to use for creating objects
	 * @var $VALID_HASH
	 */
	protected $VALID_HASH;

	/**
	 * create all dependencies before each test
	 */
	public final function setUp(): void {
		//run the default setUp() method
		parent::setUp();

		$password = "123abc";
		$this->VALID_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 384]);

		$validCategoryId = generateUuidV4();
		$validUserId = generateUuidV4();
		$validResourceId = generateUuidV4();


		//create and insert generated category
		$this->category = new Category($validCategoryId, "example");
		$this->category->insert($this->getPDO());
		//create and insert generated user
		$this->user = new User($validUserId, "01234567890123456789012345678912", "google@gmail.com", $this->VALID_HASH, "PHPUnitTesty", "YouKnightTester");
		$this->user->insert($this->getPDO());
		//create and insert generated resource
		$this->resource = new Resource($validResourceId, $validCategoryId, $validUserId, "01234567890123456789012345678912", true, "testdescriptionthiscanbeverylongbutIworksmartnothard", "google@gmail.com", "http://picture.com/image.jpg", "testname", "18006541212", "title", "http://www.google.com");
		$this->resource->insert($this->getPDO());
	}

	/**
	 * test inserting a valid useful and verify that the mysql data matches
	 */
	public function testInsertValidUseful(): void {
		//count rows and save for later
		$num_rows = $this->getConnection()->getRowCount("useful");

		//Create a new Useful object and insert it into MySQL
		$useful = new Useful($this->resource->getResourceId(), $this->user->getUserId());
		$useful->insert($this->getPDO());

		//grab data from MySQL and affirm the fields match our query
		$pdoUseful = Useful::getUsefulByUsefulResourceId($this->getPDO(), $useful->getUsefulResourceId());
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("useful"));
		$this->assertEquals($pdoUseful->getUsefulResourceId(), $this->resource->getResourceId());
		$this->assertEquals($pdoUseful->getUsefulUserId(), $this->user->getUserId());
	}

	/**
	 * test deleting a useful from mysql DB
	 */
	public function testDeleteValidUseful(): void {
		//count rows and save for later
		$num_rows = $this->getConnection()->getRowCount("useful");

		//Create a new Useful object and insert it into MySQL
		$useful = new Useful($this->resource->getResourceId(), $this->user->getUserId());
		$useful->insert($this->getPDO());

		//delete useful from MySQL
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("useful"));
		$useful->delete($this->getPDO());

		//grab data from MySQL and assert that it no longer exists
		$pdoUseful = Useful::getUsefulByUsefulResourceId($this->getPDO(), $useful->getUsefulResourceId());
		$this->assertNull($pdoUseful);
		$this->assertEquals($num_rows, $this->getConnection()->getRowCount("useful"));
	}

	/**
	 * test grabbing a useful by resource Id
	 */
	public function testGetUsefulByUsefulResourceId(): void {
		//count rows and save for later
		$num_rows = $this->getConnection()->getRowCount("useful");

		//Create a new Useful object and insert it into MySQL
		$useful = new Useful($this->resource->getResourceId(), $this->user->getUserId());
		$useful->insert($this->getPDO());

		//grab data from MySQL and affirm the fields match our query
		$results = Useful::getUsefulByUsefulResourceId($this->getPDO(), $useful->getUsefulResourceId());
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("useful"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("VeteranResource\\Resource\\Useful", $results);

		//grab results from the array and validate that it contains expected objects
		$pdoUseful = $results[0];
		$this->assertEquals($pdoUseful->getUsefulResourceId(), $this->resource->getResourceId());
		$this->assertEquals($pdoUseful->getUsefulUserId(), $this->user->getUserId());
	}
}
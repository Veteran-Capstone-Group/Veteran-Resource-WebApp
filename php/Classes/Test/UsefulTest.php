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


	public final function setUp(): void {
		//run the default setUp() method
		parent::setUp();
		//create and insert generated category
		
		//create and insert generated resource

		//create and insert generated user
	}

public function testInsertValidUseful() : void {
	//count rows and save for later
	$num_rows = $this->getConnection()->getRowCount("useful");

	//Create a new Useful object and insert it into MySQL
	$useful = new Useful($this->resource->resourceId, $this->user->userId);
	$useful->insert($this->getPDO());

	//grab data from MySQL and affirm the fields match our query
	$pdoUser = Useful::getUsefulByUsefulResourceId($this->getPDO(), $useful->getUsefulResourceId());
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$this->assertEquals($pdoUser->getUsefulResourceId(), $usefulResourceId);
	$this->assertEquals($pdoUser->getUsefulUserId(), $usefulUserId);
}
 public function testDeleteValidUseful(): void {
	 //count rows and save for later
	 $num_rows = $this->getConnection()->getRowCount("useful");

	 //Create a new Useful object and insert it into MySQL
	 //TODO change these variables to reference resource and user test variables
	 $usefulResourceId = generateUuidV4();
	 $usefulUserId = generateUuidV4();

	 $useful = new Useful($usefulResourceId, $usefulUserId);
	 $useful->insert($this->getPDO());

	 //delete useful from MySQL
	 $this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("useful"));
	 $useful->delete($this->getPDO());

	 //grab data from MySQL and assert that it no longer exists
	 $pdoUser = Useful::getUsefulByUsefulResourceId($this->getPDO(), $useful->getUsefulResourceId());
	 $this->assertNull($pdoUser);
	 $this->assertEquals($num_rows, $this->getConnection()->getRowCount("useful"));
 }









}
<?php


namespace VeteranResource\Resource\Test;
use VeteranResource\Resource\User;
//obtain Class for testing
require_once(dirname(__DIR__) . "/Test/VeteranResourceTest.php");
//obtain required dependencies for testing
require_once(dirname(__DIR__, 2) . "/Classes/autoload.php");
//grab Uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/**
 * PHPUnit test for Class User
 *
 * This is a Unit test for the User class. it tests all getters/setters, construct, getFooByBar methods, PDO methods,
 * and MySQL connection for valid and invalid inputs
 *
 * @package VeteranResource\Resource
 * @see User
 * @author Timothy Beck <dev@timothybeck.com>
 */
class UserTest extends VeteranResourceTest {

	/**
	 * Invalid and Valid test types for User Class state variables
	 *
	 * valid userActivationToken to create user object to run the test against
	 * @var string $VALID_USER_ACTIVATIONTOKEN
	 */
	protected $VALID_USER_ACTIVATIONTOKEN = "01234567890123456789012345678912";

	/**
	 * valid userEmail to create user object to run the test against
	 * @var string $VALID_USER_EMAIL
	 */
	protected $VALID_USER_EMAIL = "google@gmail.com";

	/**
	 * Second valid userEmail to create user object to run the update test against
	 * @var string $VALID_USER_EMAIL2
	 */
	protected $VALID_USER_EMAIL2 = "barricuda1993@yahoo.com";

	/**
	 * valid userHash to create user object to run the update test against
	 * @var string $VALID_USER_HASH
	 */
	protected $VALID_USER_HASH;

	/**
	 * valid userName to create user object to run the update test against
	 * @var string $VALID_USER_NAME
	 */
	protected $VALID_USER_NAME = "PHPUnitTesty";

	/**
	 * valid userUsername to create user object to run the update test against
	 * @var string $VALID_USER_USERNAME
	 */
	protected $VALID_USER_USERNAME = "YouKnightTester";

	/**
	 * create dependencies before running each test
	 */
public final function setUp(): void {
	//run the default setUp() method
	parent::setUp();
	//create generic password to test for hash
	$password = "abc123";
	//hash generic password for testing purposes
	$this->VALID_USER_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 384]);
	//There are no parent objects to this class necessary to instantiate.
	//There are no DateTime related variables requiring traits
}

/**
 * testing INSERT method by inserting a valid user and verifying MySQL accepts it
 */
public function testInsertValidUser() : void {
	//count rows and save for later
	$num_rows = $this->getConnection()->getRowCount("user");

	//Create a new User object and insert it into MySQL
	$userId = generateUuidV4();
	$user = new User($userId, $this->VALID_USER_ACTIVATIONTOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
	$user->insert($this->getPDO());

	//grab data from MySQL and affirm the fields match our query
	$pdoUser = User::getUserByUserId($this->getPDO(), $user->getUserId());
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$this->assertEquals($pdoUser->getUserId(), $userId);
	$this->assertEquals($pdoUser->getUserActivationToken(), $this->VALID_USER_ACTIVATIONTOKEN);
	$this->assertEquals($pdoUser->getUserEmail(), $this->VALID_USER_EMAIL);
	$this->assertEquals($pdoUser->getUserHash(), $this->VALID_USER_HASH);
	$this->assertEquals($pdoUser->getUserName(), $this->VALID_USER_NAME);
	$this->assertEquals($pdoUser->getUserUsername(), $this->VALID_USER_USERNAME);
}

/**
 * test inserting, editing and updating a User object in MySQL
 */
public function testUpdateValidUser(): void {
	//countrows and save for later
	$num_rows = $this->getConnection()->getRowCount("user");

	//Create a new User object and insert it into MySQL
	$userId = generateUuidV4();
	$user = new User($userId, $this->VALID_USER_ACTIVATIONTOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
	$user->insert($this->getPDO());

	//edit UserEmail and update it in mySQL
	$user->setUserEmail($this->VALID_USER_EMAIL2);
	$user->update($this->getPDO());

	// obtain data from MySQL and assert the fields to affirm they match our expectations
	$pdoUser = User::getUserByUserId($this->getPDO(), $user->getUserId());
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$this->assertEquals($pdoUser->getUserId(), $userId);
	$this->assertEquals($pdoUser->getUserActivationToken(), $this->VALID_USER_ACTIVATIONTOKEN);
	$this->assertEquals($pdoUser->getUserEmail(), $this->VALID_USER_EMAIL2);
	$this->assertEquals($pdoUser->getUserHash(), $this->VALID_USER_HASH);
	$this->assertEquals($pdoUser->getUserName(), $this->VALID_USER_NAME);
	$this->assertEquals($pdoUser->getUserUsername(), $this->VALID_USER_USERNAME);
}

/**
 * testing delete method and deleting a User object from MySQL
 */
public function testDeleteValidUser(): void {
	//countrows and save for later
	$num_rows = $this->getConnection()->getRowCount("user");

	//Create a new User object and insert it into MySQL
	$userId = generateUuidV4();
	$user = new User($userId, $this->VALID_USER_ACTIVATIONTOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
	$user->insert($this->getPDO());

	//delete user from MySQL
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$user->delete($this->getPDO());

	//grab data from MySQL and assert that it no longer exists
	$pdoUser = User::getUserByUserId($this->getPDO(), $user->getUserId());
	$this->assertNull($pdoUser);
	$this->assertEquals($num_rows, $this->getConnection()->getRowCount("user"));
}

/**
 * testing grabbing user by userUsername
 */
public function testGetValidUserByUsername(): void {
	//countrows and save for later
	$num_rows = $this->getConnection()->getRowCount("user");

	//Create a new User object and insert it into MySQL
	$userId = generateUuidV4();
	$user = new User($userId, $this->VALID_USER_ACTIVATIONTOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
	$user->insert($this->getPDO());

	//grab data from MySQL and assert to check our expectations match
	$pdoUser = User::getUserByUserUsername($this->getPDO(), $user->getUserUsername());
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$this->assertEquals($pdoUser->getUserId(), $userId);
	$this->assertEquals($pdoUser->getUserActivationToken(), $this->VALID_USER_ACTIVATIONTOKEN);
	$this->assertEquals($pdoUser->getUserEmail(), $this->VALID_USER_EMAIL);
	$this->assertEquals($pdoUser->getUserHash(), $this->VALID_USER_HASH);
	$this->assertEquals($pdoUser->getUserName(), $this->VALID_USER_NAME);
	$this->assertEquals($pdoUser->getUserUsername(), $this->VALID_USER_USERNAME);
}

/**
 * testing grabbing user by userActivationToken
 */
public function testGetValidUserByUserActivationToken(): void {
	//count rows for later
	$num_rows = $this->getConnection()->getRowCount("user");

	//Create new user object to test and insert it into MySQL
	$userId = generateUuidV4();
	$user = new User($userId, $this->VALID_USER_ACTIVATIONTOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
	$user->insert($this->getPDO());

	//grab data from MySQL and assert to check our data returns the expected match
	$pdoUser = User::getUserByUserActivationToken($this->getPDO(), $user->getUserActivationToken());
	$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("user"));
	$this->assertEquals($pdoUser->getUserId(), $userId);
	$this->assertEquals($pdoUser->getUserActivationToken(), $this->VALID_USER_ACTIVATIONTOKEN);
	$this->assertEquals($pdoUser->getUserEmail(), $this->VALID_USER_EMAIL);
	$this->assertEquals($pdoUser->getUserHash(), $this->VALID_USER_HASH);
	$this->assertEquals($pdoUser->getUserName(), $this->VALID_USER_NAME);
	$this->assertEquals($pdoUser->getUserUsername(), $this->VALID_USER_USERNAME);
}
}

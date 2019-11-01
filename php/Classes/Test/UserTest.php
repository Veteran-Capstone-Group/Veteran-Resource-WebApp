<?php


namespace VeteranResource\Resource;
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
 * @author Timothy Beck <barricuda1993@yahoo.com>
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

}
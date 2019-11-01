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

}
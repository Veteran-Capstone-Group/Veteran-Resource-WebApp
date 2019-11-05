<?php


namespace VeteranResource\Resource\Test;
use VeteranResource\Resource\Useful;
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
	}












}
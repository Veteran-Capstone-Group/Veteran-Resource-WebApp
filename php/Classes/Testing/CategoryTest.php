<?php



namespace VeteranResource\Resource;

use VeteranResource\Resource\VeteranResourceTest;
use VeteranResource\Resource\Category;

// grab the class we are testing
require_once(dirname(__DIR__,2) . "autoload.php");

// grab the uuid generator
require_once(dirname(__DIR__, 2) . "../lib/uuid.php");

/**
 * Php test for the category class
 *
 * This is a PHPUnit test of valid inputs for the category class. It tests all mySQL/PDO enabled methods for valid inputs.
 *
 * @see Category
 * @author John Johnson-Rodgers
 */
class CategoryTest extends VeteranResourceTest {
	/**
	 * Invalid and valid test names for categoryName
	 */
	protected $VALID_CATEGORY_NAME = "Mental Health";
	protected $INVALID_CATEGORY_NAME = 234;
	/**
	 * Invalid test uuid for categoryId
	 */
	protected $INVALID_CATEGORY_ID = "Bobby Bo Horseman";
	/**
	 * The valid categoryId is generated in the methods and is an UUID
	 */
	public final function setUp(): void {
		//run the default setUp() method
		parent::setUp();

		//this is a strong entity, so no need to create other objects during setUp()
	}


}
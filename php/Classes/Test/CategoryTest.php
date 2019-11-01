<?php


namespace VeteranResource\Resource;

use VeteranResource\Resource\Category;

// grab the class we are testing
require_once(dirname(__DIR__, 1) . "/autoload.php");
// grab the uuid generator
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");
require_once(dirname(__DIR__, 1) . "/Test/VeteranResourceTest.php");

/**
 * Php test for the category class
 *
 * This is a PHPUnit test of valid inputs for the category class. It tests all mySQL/PDO enabled methods for valid inputs.
 *
 * @see Category
 * @author John Johnson-Rodgers
 */
class CategoryTester extends VeteranResourceTest {
	/**
	 * Invalid and valid test types for categoryName, type2 necessary for update
	 */
	protected $VALID_CATEGORY_TYPE = "Test";
	protected $VALID_CATEGORY_TYPE2 = "Test two";
	protected $INVALID_CATEGORY_TYPE = 1234;
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

	/**
	 * test inserting a valid category and verify that mySQL data matches
	 */
	public function testInsertValidCategory(): void {
		//count rows and save for later
		$num_rows = $this->getConnection()->getRowCount("category");

		//create a new Category and insert it into mySQL
		$categoryId = generateUuidV4();
		$category = new Category($categoryId, $this->VALID_CATEGORY_TYPE);
		$category->insert($this->getPDO());

		//grab data from mySQL and assert the fields match expectations
		$pdoCategory = Category::getCategoryByCategoryId($this->getPDO(), $category->getCategoryId());
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("category"));
		$this->assertEquals($pdoCategory->getCategoryId(), $categoryId);
		$this->assertEquals($pdoCategory->getCategoryType(), $this->VALID_CATEGORY_TYPE);
	}

	/**
	 * test inserting, editing, and updating a category
	 */
	public function testUpdateValidCategory(): void {
		// count the number of rows and save for later
		$num_rows = $this->getConnection()->getRowCount("category");

		//create a new Category and insert it into mySQL
		$categoryId = generateUuidV4();
		$category = new Category($categoryId, $this->VALID_CATEGORY_TYPE);
		$category->insert($this->getPDO());

		//edit the category and update in mySQL
		$category->setCategoryType($this->VALID_CATEGORY_TYPE2);
		$tweet->update($this->getPDO());

		//grab data from mySQL and assert the fields match expectations
		// todo categoryId before $num_rows?
		$pdoCategory = Category::getCategoryByCategoryId($this->getPDO(), $category->getCategoryId());
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("category"));
		$this->assertEquals($pdoCategory->getCategoryId(), $categoryId);
		$this->assertEquals($pdoCategory->getCategoryType(), $this->VALID_CATEGORY_TYPE2);
	}

	/**
	 *test creating a category and deleting it
	 */
	public function testDeleteValidTweet(): void {
		// count the number of rows and save for later
		$num_rows = $this->getConnection()->getRowCount("category");

		//create a new Category and insert it into mySQL
		$categoryId = generateUuidV4();
		$category = new Category($categoryId, $this->VALID_CATEGORY_TYPE);
		$category->insert($this->getPDO());

		//delete category from mySQL
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("category"));
		$category->delete($this->getPDO());

		//grab data from mySQL and assert the fields match expectations
		$pdoCategory = Category::getCategoryByCategoryId($this->getPDO(), $category->getCategoryId());
		$this->assertNull($pdoCategory);
		$this->assertEquals($num_rows, $this->getConnection()->getRowCount("category"));
	}

}
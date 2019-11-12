<?php

namespace VeteranResource\Resource\Test;

use VeteranResource\Resource\Category;

// grab the class we are testing
require_once(dirname(__DIR__) . "/Test/VeteranResourceTest.php");
require_once(dirname(__DIR__, 2) . "/Classes/autoload.php");
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

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
		$category->update($this->getPDO());

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
	public function testDeleteValidCategory(): void {
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

	public function testGetAllCategories(): void {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("category");
		// create a new Category and insert to into mySQL
		$categoryId = generateUuidV4();
		$category = new Category($categoryId, $this->VALID_CATEGORY_TYPE);
		$category->insert($this->getPDO());
		// grab the data from mySQL and enforce the fields match our expectations
		$results = Category::getAllCategories($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("category"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("VeteranResource\\Resource\\Category", $results);
		// grab the result from the array and validate it
		$pdoCategory = $results[0];
		$this->assertEquals($pdoCategory->getCategoryId(), $categoryId);
		$this->assertEquals($pdoCategory->getCategoryType(), $this->VALID_CATEGORY_TYPE);

	}
}
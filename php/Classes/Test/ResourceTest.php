<?php

namespace VeteranResource\Resource;

use VeteranResource\Resource\Resource;
use VeteranResource\Resource\{Category, User};

// grab the class we are testing
require_once(dirname(__DIR__) . "/Test/VeteranResourceTest.php");
require_once(dirname(__DIR__, 2) . "/Classes/autoload.php");
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/** php test for a resource
 *
 * This is a php test of valid inputs for the Resource class. It tests all PDO methods and all getFooByBar methods associated with the resource class
 *
 * @see Resource
 * @author John Johnson-Rodgers <john@johnthe.dev>
 */
class ResourceTest extends VeteranResourceTest {
	/**
	 * User that created the resource
	 * @var User user
	 */
	protected $user = null;

	/**
	 * Category that the resource belongs to
	 * @var Category category
	 */
	protected $category = null;

	/**
	 * valid User Hash to create user object to test with
	 * @var $VALID_HASH
	 */
	protected $VALID_USER_HASH;
	/**
	 * valid userActivationToken to create user object to run the test against
	 * @var string $VALID_USER_ACTIVATIONTOKEN
	 */
	protected $VALID_USER_ACTIVATION_TOKEN = "01234567890123456789012345678912";

	/**
	 * valid userEmail to create user object to run the test against
	 * @var string $VALID_USER_EMAIL
	 */
	protected $VALID_USER_EMAIL = "google@gmail.com";

	/**
	 * valid userName to create user object to run the update test against
	 * @var string $VALID_USER_NAME
	 */
	protected $VALID_USER_NAME = "PHPUnit TestyMcNamey";

	/**
	 * valid userUsername to create user object to run the update test against
	 * @var string $VALID_USER_USERNAME
	 */
	protected $VALID_USER_USERNAME = "YouKnightTester1337";

	/**
	 *valid Address for resource
	 * @var string $VALID_RESOURCE_ADDRESS
	 */
	protected $VALID_RESOURCE_ADDRESS = "100 Martin Luther Kind Blvd Suite 1023";

	/**
	 * valid approval status for resource
	 * @var bool $VALID_RESOURCE_APPROVAL_STATUS
	 */
	protected $VALID_RESOURCE_APPROVAL_STATUS = true;

	/**
	 * valid resource description
	 * @var string $VALID_RESOURCE_DESCRIPTION
	 */
	protected $VALID_RESOURCE_DESCRIPTION = "This is a great place to find a coding partner or an espresso";

	/**
	 * second valid resource description
	 * @var string $VALID_RESOURCE_DESCRIPTION_2
	 */
	protected $VALID_RESOURCE_DESCRIPTION_2 = "Nevermind, it is full of bugs, I hate it with a fiery passion";

	/**
	 * valid resource email
	 * @var string $VALID_RESOURCE_EMAIL
	 */
	protected $VALID_RESOURCE_EMAIL = "easy@thatwas.com";

	/**
	 * Valid URL for an image
	 * @var string $VALID_RESOURCE_IMAGE_URL
	 */
	protected $VALID_RESOURCE_IMAGE_URL = "https://images.pexels.com/photos/104827/cat-pet-animal-domestic-104827.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

	/**
	 * Valid organization for resource
	 * @var string $VALID_RESOURCE_ORGANIZATION
	 */
	protected $VALID_RESOURCE_ORGANIZATION = "Veterans Affairs";

	/**
	 * valid phone number for resource
	 * @var string $VALID_RESOURCE_PHONE
	 */
	protected $VALID_RESOURCE_PHONE = "(505)340-6292 EXT 1001";

	/**
	 * valid resource title
	 * @var string $VALID_RESOURCE_TITLE
	 */
	protected $VALID_RESOURCE_TITLE = "Best Code Bar USA";

	/**
	 * valid resource URL
	 * @var string $VALID_RESOURCE_URL
	 */
	protected $VALID_RESOURCE_URL = "www.welovevetcoders.com";

	/**
	 * Create dependant objects before running each test
	 */
	public final function setUp(): void {
		//run default setUp()
		parent::setUp();
		$password = "password1";
		$this->VALID_USER_HASH = password_hash($password, PASSWORD_ARGON2I, ["time_cost" => 384]);

		//create and insert user to own test resource
		$this->user = new User(generateUuidV4(), $this->VALID_USER_ACTIVATION_TOKEN, $this->VALID_USER_EMAIL, $this->VALID_USER_HASH, $this->VALID_USER_NAME, $this->VALID_USER_USERNAME);
		$this->user->insert($this->getPDO());

		//Create and insert category for resource to belong to
		$this->category = new Category(generateUuidV4(), "Job Help");
		$this->category->insert($this->getPDO());

	}

	/**
	 * test inserting a valid resource and verify that MySQL matches
	 */
	public function testInsertValidResource(): void {
		//create new resource and insert it
		$resourceId = generateUuidV4();
		$resource = new Resource($resourceId, $this->category->getCategoryId(), $this->user->getUserId(), $this->VALID_RESOURCE_ADDRESS, $this->VALID_RESOURCE_APPROVAL_STATUS, $this->VALID_RESOURCE_DESCRIPTION, $this->VALID_RESOURCE_EMAIL, $this->VALID_RESOURCE_IMAGE_URL, $this->VALID_RESOURCE_ORGANIZATION, $this->VALID_RESOURCE_PHONE, $this->VALID_RESOURCE_TITLE, $this->VALID_RESOURCE_URL);
		$resource->insert($this->getPDO());

		//grab data from MySQL
		$pdoResource = Resource::getResourceByResourceId($this->getPDO(), $resource->getResourceId());

		//enforce that the fields match expectations
		$this->assertEquals($pdoResource->getResourceId()->toString(), $resourceId->toString());
		$this->assertEquals($pdoResource->getResourceCategoryId()->toString(), $resource->getResourceCategoryId()->toString());
		$this->assertEquals($pdoResource->getResourceUserId()->toString(), $resource->getResourceUserId()->toString());
		$this->assertEquals($pdoResource->getResourceAddress(), $this->VALID_RESOURCE_ADDRESS);
		$this->assertEquals($pdoResource->getResourceApprovalStatus(), $this->VALID_RESOURCE_APPROVAL_STATUS);
		$this->assertEquals($pdoResource->getResourceDescription(), $this->VALID_RESOURCE_DESCRIPTION);
		$this->assertEquals($pdoResource->getResourceEmail(), $this->VALID_RESOURCE_EMAIL);
		$this->assertEquals($pdoResource->getResourceImageUrl(), $this->VALID_RESOURCE_IMAGE_URL);
		$this->assertEquals($pdoResource->getResourceOrganization(), $this->VALID_RESOURCE_ORGANIZATION);
		$this->assertEquals($pdoResource->getResourcePhone(), $this->VALID_RESOURCE_PHONE);
		$this->assertEquals($pdoResource->getResourceTitle(), $this->VALID_RESOURCE_TITLE);
		$this->assertEquals($pdoResource->getResourceUrl(), $this->VALID_RESOURCE_URL);
	}

	/**
	 * test inserting a resource, editing it, and then checking if it updated
	 */
	public function testUpdateValidResource(): void {
		//count number of rows to save for later
		$num_rows = $this->getConnection()->getRowCount("resource");

		//create new resource
		$resourceId = generateUuidV4();
		$resource = new Resource($resourceId, $this->category->getCategoryId(), $this->user->getUserId(), $this->VALID_RESOURCE_ADDRESS, $this->VALID_RESOURCE_APPROVAL_STATUS, $this->VALID_RESOURCE_DESCRIPTION, $this->VALID_RESOURCE_EMAIL, $this->VALID_RESOURCE_IMAGE_URL, $this->VALID_RESOURCE_ORGANIZATION, $this->VALID_RESOURCE_PHONE, $this->VALID_RESOURCE_TITLE, $this->VALID_RESOURCE_URL);
		$resource->insert($this->getPDO());

		//edit the resource and update it
		$resource->setResourceDescription($this->VALID_RESOURCE_DESCRIPTION_2);
		$resource->update($this->getPDO());

		//enforce that the fields match expectations
		$pdoResource = Resource::getResourceByResourceId($this->getPDO(), $resource->getResourceId());
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("resource"));
		$this->assertEquals($pdoResource->getResourceId()->toString(), $resourceId->toString());
		$this->assertEquals($pdoResource->getResourceCategoryId()->toString(), $resource->getResourceCategoryId()->toString());
		$this->assertEquals($pdoResource->getResourceUserId()->toString(), $resource->getResourceUserId()->toString());
		$this->assertEquals($pdoResource->getResourceAddress(), $this->VALID_RESOURCE_ADDRESS);
		$this->assertEquals($pdoResource->getResourceApprovalStatus(), $this->VALID_RESOURCE_APPROVAL_STATUS);
		$this->assertEquals($pdoResource->getResourceDescription(), $this->VALID_RESOURCE_DESCRIPTION_2);
		$this->assertEquals($pdoResource->getResourceEmail(), $this->VALID_RESOURCE_EMAIL);
		$this->assertEquals($pdoResource->getResourceImageUrl(), $this->VALID_RESOURCE_IMAGE_URL);
		$this->assertEquals($pdoResource->getResourceOrganization(), $this->VALID_RESOURCE_ORGANIZATION);
		$this->assertEquals($pdoResource->getResourcePhone(), $this->VALID_RESOURCE_PHONE);
		$this->assertEquals($pdoResource->getResourceTitle(), $this->VALID_RESOURCE_TITLE);
		$this->assertEquals($pdoResource->getResourceUrl(), $this->VALID_RESOURCE_URL);
	}

	public function testDeleteValidResource():void{
		//count number of rows to save for later
		$num_rows = $this->getConnection()->getRowCount("resource");

		//create new resource
		$resourceId = generateUuidV4();
		$resource = new Resource($resourceId, $this->category->getCategoryId(), $this->user->getUserId(), $this->VALID_RESOURCE_ADDRESS, $this->VALID_RESOURCE_APPROVAL_STATUS, $this->VALID_RESOURCE_DESCRIPTION, $this->VALID_RESOURCE_EMAIL, $this->VALID_RESOURCE_IMAGE_URL, $this->VALID_RESOURCE_ORGANIZATION, $this->VALID_RESOURCE_PHONE, $this->VALID_RESOURCE_TITLE, $this->VALID_RESOURCE_URL);
		$resource->insert($this->getPDO());

		//delete resource from MySQL
		$this->assertEquals($num_rows + 1, $this->getConnection()->getRowCount("resource"));
		$resource->delete($this->getPDO());

		//Make sure resource no longer exists
		$pdoResource = Resource::getResourceByResourceId($this->getPDO(), $resource->getResourceId());
		$this->assertNull($pdoResource);
		$this->assertEquals($num_rows, $this->getConnection()->getRowCount("resource"));
	}


}
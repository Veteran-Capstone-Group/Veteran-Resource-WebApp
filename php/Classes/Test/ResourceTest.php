<?php

namespace VeteranResource\Resource;
use VeteranResource\Resource\Resource;
use VeteranResource\Resource\{Category, User};

// grab the class we are testing
require_once (dirname(__DIR__)."/Test/VeteranResourceTest.php");
require_once(dirname(__DIR__, 2) . "/Classes/autoload.php");
require_once(dirname(__DIR__, 2) . "/lib/uuid.php");

/** php test for a resource
 *
 * This is a php test of valid inputs for the Resource class. It tests all PDO methods and all getFooByBar methods associated with the resource class
 *
 *@see Resource
 *@author John Johnson-Rodgers <john@johnthe.dev>
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


}
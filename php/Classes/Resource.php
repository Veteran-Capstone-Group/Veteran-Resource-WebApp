<?php

namespace VeteranResource\Resource;
//check this out when autoload is created
//require_once("autoload.php");
//Check this out once vendor is implemented
//require_once(dirname(__DIR__) . "/lib/vendor/autoload.php");

//use Ramsey\Uuid\Uuid;

/**
 * Class Resource for Veteran Resource WebApp
 * @package VeteranResource\Resource
 *
 * Description: This class will be used to store resource information for the WebApp. It currently has commented code in
 * the top that will be implemented as features are added.
 *
 * @author John Johnson-Rodgers <john@johnthe.dev>
 * @version 1.0.0
 */
class Resource {
	//use ValidateUuid;
	/**
	 * id for resource; Primary Key Not Null
	 * @var Uuid $resourceId
	 */
	private $resourceId;
	/**
	 * Foreign Key resourceCategoryId refers to categoryId Not Null, Indexed
	 * @var Uuid $resourceCategoryId
	 */
	private $resourceCategoryId;
	/**
	 * Foreign Key resourceUserID refers to userId
	 * @var Uuid $resourceUserId
	 */
	private $resourceUserId;
	/**
	 * contains address for the resource, <=124 Nullable
	 * @var string $resourceAddress
	 */
	private $resourceAddress;
	/**
	 * contains true if approved, false
	 * @var boolean $resourceApprovalStatus
	 */
	private $resourceApprovalStatus;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceCategory;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceDescription;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceEmail;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceImageUrl;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceOrganization;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourcePhone;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceTitle;
	/**
	 * contains address for the resource, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceUrl;

}
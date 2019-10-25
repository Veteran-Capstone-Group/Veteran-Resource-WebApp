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
	 * contains address for the resource, <=124, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceAddress;
	/**
	 * contains true if approved, false
	 * @var boolean $resourceApprovalStatus
	 */
	private $resourceApprovalStatus;
	/**
	 * contains description of the resource, <=300, Not Null
	 * @var string $resourceDescription
	 */
	private $resourceDescription;
	/**
	 * contains email address for the resource, <=124, Nullable
	 * @var string $resourceEmail
	 */
	private $resourceEmail;
	/**
	 * contains Image Url for the resource, <=255, Nullable
	 * @var string $resourceImageUrl
	 */
	private $resourceImageUrl;
	/**
	 * contains organization for the resource, <=124, Nullable
	 * @var string $resourceOrganization
	 */
	private $resourceOrganization;
	/**
	 * contains phone number for the resource, <=11, Nullable
	 * @var string $resourcePhone
	 */
	private $resourcePhone;
	/**
	 * contains title for the resource, <=64, Not Null
	 * @var string $resourceTitle
	 */
	private $resourceTitle;
	/**
	 * contains Url for the resource, <=255, Not Null
	 * @var string $resourceUrl
	 */
	private $resourceUrl;

}
<?php

namespace VeteranResource\Resource;
//check this out when autoload is created
//require_once("autoload.php");
//Check this out once vendor is implemented
//require_once(dirname(__DIR__) . "/lib/vendor/autoload.php");

//use Ramsey\Uuid\Uuid;
use http\Exception\BadMessageException;

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

	/**
	 * Resource constructor.
	 * @param string|Uuid $newResourceId id for this resource or null if new resource
	 * @param string|Uuid $newResourceCategoryId ResourceCategory for this resource or null if new resource
	 * @param string|Uuid $newResourceUserId UserId for the person who created resource or null if new resource
	 * @param string $newResourceAddress Physical Address for this resource or null if new resource
	 * @param bool $newResourceApprovalStatus Approval Status for this resource or null if new resource
	 * @param string $newResourceDescription Description for this resource or null if new resource
	 * @param string $newResourceEmail Email Address for this resource or null if new resource
	 * @param string $newResourceImageUrl Image Url for this resource or null if new resource
	 * @param string $newResourceOrganization Organization associated with this resource or null if new resource
	 * @param string $newResourcePhone phone number for this resource or null if new resource
	 * @param string $newResourceTitle Title for this resource or null if new resource
	 * @param string $newResourceUrl URL source for this resource or null if new resource
	 */
	public function __construct($newResourceId, $newResourceCategoryId, $newResourceUserId, string $newResourceAddress, bool $newResourceApprovalStatus, string $newResourceDescription, string $newResourceEmail, string $newResourceImageUrl, string $newResourceOrganization, string $newResourcePhone, string $newResourceTitle, string $newResourceUrl) {
		try {
			$this->setResourceId($newResourceId);
			$this->setResourceCategoryId($newResourceCategoryId);
			$this->setResourceUserId($newResourceUserId);
			$this->setResourceAddress($newResourceAddress);
			$this->setResourceApprovalStatus($newResourceApprovalStatus);
			$this->setResourceDescription($newResourceDescription);
			$this->setResourceEmail($newResourceEmail);
			$this->setResourceImageUrl($newResourceImageUrl);
			$this->setResourceOrganization($newResourceOrganization);
			$this->setResourcePhone($newResourcePhone);
			$this->setResourceTitle($newResourceTitle);
			$this->setResourceUrl($newResourceUrl);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 101, $exception));
		}
	}

	/**
	 * Accessor for resourceId
	 *
	 * @return Uuid
	 */
	public function getResourceId(): Uuid {
		return ($this->resourceId);
	}

	/**
	 * Mutator for resourceId
	 *
	 * @param $newResourceId
	 * @throws \Exception if $newResourceId is an invalid argument, in an invalid range, is a type error, or is another type of exception.
	 */
	public function setResourceId($newResourceId): void {
		try {
			$uuid = self::validateUuid($newResourceId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store Resource Id
		$this->resourceId = $uuid;
	}

	/**
	 * Accessor for resourceCategoryId
	 *
	 * @return Uuid
	 */
	public function getResourceCategoryId(): Uuid {
		return ($this->resourceCategoryId);
	}

	/**
	 * Mutator for resourceCategoryId
	 *
	 * @param $newResourceCategoryId
	 * @throws \Exception if $newResourceCategoryId is an invalid argument, in an invalid range, is a type error, or is another type of exception.
	 */
	public function setResourceCategoryId($newResourceCategoryId): void {
		try {
			$uuid = self::validateUuid($newResourceCategoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store Resource Id
		$this->resourceCategoryId = $uuid;
	}

	/**
	 * Accessor for resourceUserId
	 *
	 * @return Uuid
	 */
	public function getResourceUserId(): Uuid {
		return ($this->resourceUserId);
	}

	/**
	 * Mutator for resourceUserId
	 *
	 * @param $newResourceUserId
	 * @throws \Exception if $newResourceUserId is an invalid argument, in an invalid range, is a type error, or is another type of exception.
	 */
	public function setResourceUserId($newResourceUserId): void {
		try {
			$uuid = self::validateUuid($newResourceUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store Resource User Id
		$this->resourceUserId = $uuid;
	}

	/**
	 * Accessor for resourceAddress
	 *
	 * @return string
	 */
	public function getResourceAddress(): string {
		return ($this->resourceAddress);
	}

	/**
	 * Mutator method for resourceAddress
	 *
	 * @param $newResourceAddress
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceAddress(string $newResourceAddress): void {
		//trims whitespace
		$newResourceAddress=trim($newResourceAddress);
		//sanitizes string to get rid of harmful attacks
		$newResourceAddress=filter_var($newResourceAddress, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		//Checks if string still has content after sanitization
		if(empty($newResourceAddress)===true) {
			//if string is empty, output error
			throw(new \InvalidArgumentException("Address is empty or insecure"));
		}
		//check if string length is appropriate
		if(strlen($newResourceAddress)>124) {
			throw(new \RangeException("Address contains too many characters"));
		}
		//store content
		$this->resourceAddress=$newResourceAddress;
	}

	/**
	 * Accessor for resourceApprovalStatus
	 *
	 * @return bool
	 */
	public function getResourceApprovalStatus():bool {
	return ($this->resourceApprovalStatus);
	}

	/**
	 * Mutator Method for resourceApprovalStatus
	 *
	 * @param bool $newResourceApprovalStatus
	 */
	public function setResourceApprovalStatus(bool $newResourceApprovalStatus=false):void {
		$newResourceApprovalStatus=filter_var($newResourceApprovalStatus, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
		//Checks if null
		if(empty($newResourceApprovalStatus)===true) {
			//if approval status is null, set to false
			$this->resourceApprovalStatus=false;
		}
	$this->resourceApprovalStatus=$newResourceApprovalStatus;
	}


}
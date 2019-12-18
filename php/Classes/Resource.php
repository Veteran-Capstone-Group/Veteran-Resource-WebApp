<?php




namespace VeteranResource\Resource;
use Ramsey\Uuid\Uuid;
require_once(dirname(__DIR__, 1)."/Classes/autoload.php");
require_once(dirname(__DIR__, 1) . "/vendor/autoload.php");
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
class Resource implements \JsonSerializable {
	use ValidateUuid;
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
	 * Foreign Key resourceUserID refers to userId, Not Null
	 * @var Uuid $resourceUserId
	 */
	private $resourceUserId;
	/**
	 * contains address for the resource, <=124, Nullable
	 * @var string $resourceAddress
	 */
	private $resourceAddress;
	/**
	 * contains true if approved, false otherwise, Not Null
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
	public function __construct($newResourceId, $newResourceCategoryId, $newResourceUserId, ?string $newResourceAddress, ?bool $newResourceApprovalStatus, string $newResourceDescription, string $newResourceEmail, ?string $newResourceImageUrl, ?string $newResourceOrganization, ?string $newResourcePhone, string $newResourceTitle, string $newResourceUrl) {
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
	 * Accessor for resourceId Not Null
	 * Primary Key
	 *
	 * @return Uuid Primary Key resourceId
	 */
	public function getResourceId(): Uuid {
		return ($this->resourceId);
	}

	/**
	 * Mutator for resourceId Not Null
	 * Primary Key
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
	 * Accessor for resourceCategoryId Not Null
	 * foreign Key
	 *
	 * @return Uuid Foreign Key relates to categoryId
	 */
	public function getResourceCategoryId(): Uuid {
		return ($this->resourceCategoryId);
	}

	/**
	 * Mutator for resourceCategoryId Not Null
	 * foreign Key
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
	 * Accessor for resourceUserId Not Null
	 * foreign Key
	 *
	 * @return Uuid Foreign Key relates to userId
	 */
	public function getResourceUserId(): Uuid {
		return ($this->resourceUserId);
	}

	/**
	 * Mutator for resourceUserId Not Null
	 * foreign Key
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
	 * @return string for Resource Address can be null
	 */
	public function getResourceAddress(): string {
		return ($this->resourceAddress);
	}

	/**
	 * Mutator method for resourceAddress can be null
	 *
	 * @param $newResourceAddress
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceAddress(?string $newResourceAddress): void {
		//trims whitespace
		$newResourceAddress = trim($newResourceAddress);
		//sanitizes string to get rid of harmful attacks
		$newResourceAddress = filter_var($newResourceAddress, FILTER_SANITIZE_STRING);
		//check if string length is appropriate
		if(strlen($newResourceAddress) > 124) {
			throw(new \RangeException("Address contains too many characters"));
		}
		//store content
		$this->resourceAddress = $newResourceAddress;
	}

	/**
	 * Accessor for resourceApprovalStatus
	 *
	 * @return bool pertaining to the approval of the resource
	 */
	public function getResourceApprovalStatus(): bool {
		return ($this->resourceApprovalStatus);
	}

	/**
	 * Mutator Method for resourceApprovalStatus
	 *
	 * @param bool $newResourceApprovalStatus not null
	 */
	public function setResourceApprovalStatus(?bool $newResourceApprovalStatus): void {
		$newResourceApprovalStatus = filter_var($newResourceApprovalStatus, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
		//Checks if true
		if($newResourceApprovalStatus === true) {
			//if approval status is true, set to true
			$this->resourceApprovalStatus = $newResourceApprovalStatus;
			return;
		}
		//else set to false
		$this->resourceApprovalStatus = 0;
	}

	/**
	 * Accessor for resourceDescription
	 *
	 * @return string
	 */
	public function getResourceDescription(): string {
		return ($this->resourceDescription);
	}

	/**
	 * Mutator method for resourceDescription
	 *
	 * @param $newResourceDescription
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceDescription(string $newResourceDescription): void {
		//trims whitespace
		$newResourceDescription = trim($newResourceDescription);
		//sanitizes string to get rid of harmful attacks
		$newResourceDescription = filter_var($newResourceDescription, FILTER_SANITIZE_STRING);
		//check if string length is appropriate
		if(strlen($newResourceDescription) > 300) {
			throw(new \RangeException("Description contains too many characters"));
		}
		//store content
		$this->resourceDescription = $newResourceDescription;
	}

	/**
	 * Accessor for resourceEmail
	 *
	 * @return string
	 */
	public function getResourceEmail(): string {
		return ($this->resourceEmail);
	}

	/**
	 * Mutator method for resourceEmail
	 *
	 * @param $newResourceEmail
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceEmail(string $newResourceEmail): void {
		//trims whitespace
		$newResourceEmail = trim($newResourceEmail);
		//sanitizes email to get rid of harmful attacks and ensure valid email address
		$newResourceEmail = filter_var($newResourceEmail, FILTER_SANITIZE_EMAIL);
		//check if string length is appropriate
		if(strlen($newResourceEmail) > 124) {
			throw(new \RangeException("Email contains too many characters"));
		}
		//store content
		$this->resourceEmail = $newResourceEmail;
	}

	/**
	 * Accessor for resourceImageUrl
	 *
	 * @return string
	 */
	public function getResourceImageUrl(): string {
		return ($this->resourceImageUrl);
	}

	/**
	 * Mutator method for resourceImageUrl
	 *
	 * @param $newResourceImageUrl
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceImageUrl(string $newResourceImageUrl): void {
		//trims whitespace
		$newResourceImageUrl = trim($newResourceImageUrl);
		//sanitizes URL to get rid of harmful attacks
		$newResourceImageUrl = filter_var($newResourceImageUrl, FILTER_SANITIZE_URL);
		//check if string length is appropriate
		if(strlen($newResourceImageUrl) > 255) {
			throw(new \RangeException("Image Url contains too many characters"));
		}
		//store content
		$this->resourceImageUrl = $newResourceImageUrl;
	}

	/**
	 * Accessor for resourceOrganization
	 *
	 * @return string
	 */
	public function getResourceOrganization(): string {
		return ($this->resourceOrganization);
	}

	/**
	 * Mutator method for resourceOrganization
	 *
	 * @param $newResourceOrganization
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceOrganization(string $newResourceOrganization): void {
		//trims whitespace
		$newResourceOrganization = trim($newResourceOrganization);
		//sanitizes string to get rid of harmful attacks
		$newResourceOrganization = filter_var($newResourceOrganization, FILTER_SANITIZE_STRING);
		//check if string length is appropriate
		if(strlen($newResourceOrganization) > 124) {
			throw(new \RangeException("Organization contains too many characters"));
		}
		//store content
		$this->resourceOrganization = $newResourceOrganization;
	}

	/**
	 * Accessor for resourcePhone
	 *
	 * @return string
	 */
	public function getResourcePhone(): string {
		return ($this->resourcePhone);
	}

	/**
	 * Mutator method for resourcePhone
	 *
	 * @param $newResourcePhone
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	// todo Rewrite validation once table is updated to have input be a string of 25 characters
	public function setResourcePhone(string $newResourcePhone): void {
		//trims whitespace
		$newResourcePhone = trim($newResourcePhone);
		//sanitizes string to get rid of harmful attacks
		$newResourcePhone = filter_var($newResourcePhone, FILTER_SANITIZE_STRING);
		//General too many characters exception
		if(strlen($newResourcePhone) > 20) {
			throw(new \RangeException("Phone contains too many characters"));
		}
		//
		//store content
		$this->resourcePhone = $newResourcePhone;
	}

	/**
	 * Accessor for resourceTitle
	 *
	 * @return string
	 */
	public function getResourceTitle(): string {
		return ($this->resourceTitle);
	}

	/**
	 * Mutator method for resourceTitle
	 *
	 * @param $newResourceTitle
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceTitle(string $newResourceTitle): void {
		//trims whitespace
		$newResourceTitle = trim($newResourceTitle);
		//sanitizes string to get rid of harmful attacks
		$newResourceTitle = filter_var($newResourceTitle, FILTER_SANITIZE_STRING);
		//Checks if string still has content after sanitization
		if(empty($newResourceTitle) === true) {
			//if string is empty, output error
			throw(new \InvalidArgumentException("Title is empty or insecure"));
		}
		//check if string length is appropriate
		if(strlen($newResourceTitle) > 64) {
			throw(new \RangeException("Title contains too many characters"));
		}
		//store content
		$this->resourceTitle = $newResourceTitle;
	}

	/**
	 * Accessor for resourceUrl
	 *
	 * @return string
	 */
	public function getResourceUrl(): string {
		return ($this->resourceUrl);
	}

	/**
	 * Mutator method for resourceUrl
	 *
	 * @param $newResourceUrl
	 * @throws \InvalidArgumentException if empty or not safe
	 * @throws \RangeException if too long
	 * @throws \TypeError if not a string
	 */
	public function setResourceUrl(string $newResourceUrl): void {
		//trims whitespace
		$newResourceUrl = trim($newResourceUrl);
		//sanitizes URL to get rid of harmful attacks
		$newResourceUrl = filter_var($newResourceUrl, FILTER_SANITIZE_URL);
		//Checks if string still has content after sanitization
		if(empty($newResourceUrl) === true) {
			//if string is empty, output error
			throw(new \InvalidArgumentException("Image Url is empty or insecure"));
		}
		//check if string length is appropriate
		if(strlen($newResourceUrl) > 255) {
			throw(new \RangeException("Image Url contains too many characters"));
		}
		//store content
		$this->resourceUrl = $newResourceUrl;
	}

	/**
	 * inserts this Resource into mySQL
	 *
	 * @param \PDO $pdo PDO connection Object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo): void {
		//create query template
		$query = "INSERT INTO resource(resourceId, resourceUserId, resourceCategoryId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceURL) VALUES(:resourceId, :resourceUserId, :resourceCategoryId, :resourceAddress, :resourceApprovalStatus, :resourceDescription, :resourceEmail, :resourceImageUrl, :resourceOrganization, :resourcePhone, :resourceTitle, :resourceUrl)";
		$statement = $pdo->prepare($query);
		//bind the member variables to the place holders in the template
		$parameters = ["resourceId" => $this->resourceId->getBytes(), "resourceUserId" => $this->resourceUserId->getBytes(), "resourceCategoryId" => $this->resourceCategoryId->getBytes(), "resourceAddress" => $this->resourceAddress, "resourceApprovalStatus" => $this->resourceApprovalStatus, "resourceDescription" => $this->resourceDescription, "resourceEmail" => $this->resourceEmail, "resourceImageUrl" => $this->resourceImageUrl, "resourceOrganization" => $this->resourceOrganization, "resourcePhone" => $this->resourcePhone, "resourceTitle" => $this->resourceTitle, "resourceUrl" => $this->resourceUrl];
		$statement->execute($parameters);
	}

	/**
	 * deletes this Resource from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM resource WHERE resourceId = :resourceId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the placeholder in the template
		$parameters = ["resourceId" => $this->resourceId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * updates this Resource in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		//create query template
		$query = "UPDATE resource SET resourceId = :resourceId, resourceUserId = :resourceUserId, resourceCategoryId = :resourceCategoryId, resourceAddress = :resourceAddress, resourceApprovalStatus = :resourceApprovalStatus, resourceDescription = :resourceDescription, resourceEmail = :resourceEmail, resourceImageUrl = :resourceImageUrl, resourceOrganization = :resourceOrganization, resourcePhone = :resourcePhone, resourceTitle = :resourceTitle WHERE resourceId = :resourceId";
		$statement = $pdo->prepare($query);
//bind member variables to the placeholders in the template
		$parameters = ["resourceId" => $this->resourceId->getBytes(), "resourceUserId" => $this->resourceUserId->getBytes(), "resourceCategoryId" => $this->resourceCategoryId->getBytes(), "resourceAddress" => $this->resourceAddress, "resourceApprovalStatus" => $this->resourceApprovalStatus, "resourceDescription" => $this->resourceDescription, "resourceEmail" => $this->resourceEmail, "resourceImageUrl" => $this->resourceImageUrl, "resourceOrganization" => $this->resourceOrganization, "resourcePhone" => $this->resourcePhone, "resourceTitle" => $this->resourceTitle, "resourceUrl" => $this->resourceUrl];
		$statement->execute($parameters);
	}

	/**
	 * Gets resource by category id, using foreign key to relate to category.
	 *
	 * @param \PDO $pdo
	 * @param $resourceCategoryId
	 * @return \SplFixedArray
	 * @throws \PDOException when MySQL Errors happen
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getResourceByResourceCategoryId(\PDO $pdo, $resourceCategoryId): \SplFixedArray {
		//Validate resourceCategoryId
		try {
			$resourceCategoryId = self::validateUuid($resourceCategoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT resourceId, resourceCategoryId, resourceUserId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceUrl FROM resource WHERE resourceCategoryId = :resourceCategoryId";
		$statement = $pdo->prepare($query);
		//bind the resourceCategoryId to the place holder in MySQL
		$parameters = ["resourceCategoryId" => $resourceCategoryId->getBytes()];
		$statement->execute($parameters);
		//build an array of resources
		$resources = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$resource = new Resource($row["resourceId"], $row["resourceCategoryId"], $row["resourceUserId"], $row["resourceAddress"], $row["resourceApprovalStatus"], $row["resourceDescription"], $row["resourceEmail"], $row["resourceImageUrl"], $row["resourceOrganization"], $row["resourcePhone"], $row["resourceTitle"], $row["resourceUrl"]);
				$resources[$resources->key()] = $resource;
				$resources->next();
			} catch(\Exception $exception) {
				//if the row can't be converted, throw it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($resources);
	}

	/**
	 * Gets resource object from the primary key, resourceId.
	 *
	 * @param PDO $pdo
	 * @param $resourceId
	 * @return Resource|null
	 * @throws /PDOException when MySQL related errors occur
	 * @throws /TypeError when a variable is not the correct type
	 */
	public static function getResourceByResourceId(\PDO $pdo, $resourceId): ?Resource {
		// Checks to see if it is a Uuid or changes string to Uuid
		try {
			$resourceId = self::validateUuid($resourceId);
		} catch(\InvalidArgumentException | \RangeException | \Exception |\TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT resourceId, resourceCategoryId, resourceUserId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceUrl FROM resource WHERE resourceId = :resourceId";
		$statement = $pdo->prepare($query);

		//bind the resource Id to the placeholder
		$parameters = ["resourceId" => $resourceId->getBytes()];
		$statement->execute($parameters);

		// grab the resource from mySQL
		try {
			$resource = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$resource = new Resource($row["resourceId"], $row["resourceCategoryId"], $row["resourceUserId"], $row["resourceAddress"], $row["resourceApprovalStatus"], $row["resourceDescription"], $row["resourceEmail"], $row["resourceImageUrl"], $row["resourceOrganization"], $row["resourcePhone"], $row["resourceTitle"], $row["resourceUrl"]);
				}
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($resource);
	}

	/**
	 * Gets resource by category id, using foreign key to relate to category.
	 *
	 * @param \PDO $pdo
	 * @param $resourceUserId
	 * @return \SplFixedArray
	 * @throws \PDOException when MySQL Errors happen
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getResourceByResourceUserId(\PDO $pdo, $resourceUserId): \SplFixedArray {
		//Validate resourceUserId
		try {
			$resourceUserId = self::validateUuid($resourceUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT resourceId, resourceCategoryId, resourceUserId, resourceAddress, resourceApprovalStatus, resourceDescription, resourceEmail, resourceImageUrl, resourceOrganization, resourcePhone, resourceTitle, resourceUrl FROM resource WHERE resourceUserId = :resourceUserId";
		$statement = $pdo->prepare($query);
		//bind the resourceUserId to the place holder in MySQL
		$parameters = ["resourceUserId" => $resourceUserId->getBytes()];
		$statement->execute($parameters);
		//build an array of Users
		$resources = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$resource = new Resource($row["resourceId"], $row["resourceCategoryId"], $row["resourceUserId"], $row["resourceAddress"], $row["resourceApprovalStatus"], $row["resourceDescription"], $row["resourceEmail"], $row["resourceImageUrl"], $row["resourceOrganization"], $row["resourcePhone"], $row["resourceTitle"], $row["resourceUrl"]);
				$resources[$resources->key()] = $resource;
				$resources->next();
			} catch(\Exception $exception) {
				//if the row can't be converted, throw it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($resources);
	}

	/**
	 * converts Uuids to strings to serialize
	 *
	 * @return array converts Uuids to strings
	 */
	public function jsonSerialize() : array {
		$fields = get_object_vars( $this );
		$fields["resourceId"] = $this->resourceId->toString();
		$fields["resourceCategoryId"] = $this->resourceCategoryId->toString();
		$fields["resourceUserId"] = $this->resourceUserId->toString();
		return($fields);
	}
}


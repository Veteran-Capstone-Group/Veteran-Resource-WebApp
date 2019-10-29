<?php


namespace VeteranResource\Resource;
use Ramsey\Uuid\Uuid;
/**
 * Creating Class User for generating new categories
 *
 * @package VeteranResource\Resource
 * @Author Timothy Beck <barricuda1993@yahoo.com>
 */
class Category{
	use ValidateUuid;

	/**
	 * Id for this category, this is the primary key
	 * @var Uuid|string $categoryId
	 */
	private $categoryId;

	/**
	 * Type of category
	 * @var string $categoryType
	 */
	private $categoryType;

	public function __construct(Uuid $categoryId,string $categoryType) {
		try {
			$this->setCategoryId($categoryId);
			$this->setCategoryType($categoryType);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	//getters and setters

	/**
	 * this is the getter method for categoryId
	 * @return Uuid $categoryId
	 */
	public function getCategoryId(): Uuid {
		return($this->categoryId);
	}

	/**
	 * this is the setter for category Id
	 * @param Uuid $newCategoryId
	 */
	public function setCategoryId(Uuid $newCategoryId): void {
		//verify Uuid
		try {
			$uuid = self::validateUuid($newCategoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//return Uuid
		$this->categoryId = $uuid;
	}

	/**
	 * this is the getter method for categoryType
	 * @var string $categoryType
	 */
	public function getCategoryType(): string {
		return($this->categoryType);
	}

	/**
	 * this is the setter method for categoryType
	 * @param string $newCategoryType
	 */
	public function setCategoryType(string $newCategoryType): void {
		//sanitize string
		$newCategoryType = trim($newCategoryType);
		$newCategoryType = filter_var($newCategoryType, FILTER_SANITIZE_STRING);
		// check is string is >16 characters
		if(strlen($newCategoryType) > 16) {
			throw(new \RangeException("Username must include less than 16 characters"));
		}
		//return string
		$this->categoryType = $newCategoryType;
	}

	public function getCategoryByCategoryId(\PDO $pdo, Uuid $categoryId) {
		//sanitize uuid
		try {
			$categoryId = self::validateUuid($categoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT categoryId, categoryType FROM category WHERE 'categoryId' = :categoryId";
		$statement = $pdo->prepare($query);
		//set parameters to execute
		$parameters = ['categoryId' => $categoryId->getBytes()];
		$statement->execute($parameters);
		//grab user from MySQL
		try {
			$category = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row =$statement->fetch();
			if($row !== false) {
				$category = new Category($row['$categoryId'], $row['$categoryType']);
			}
		} catch(\Exception $exception) {
			//if row can't be converted rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($category);
	}


	//JsonSerialize
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);
		$fields["categoryId"] = $this->categoryId->toString();
		return($fields);
	}
}
<?php


namespace VeteranResource\Resource;
use Ramsey\Uuid\Uuid;
require_once(dirname(__DIR__) . "/Classes/autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");
/**
 * Creating Class User for generating new categories
 *
 * @package VeteranResource\Resource
 * @Author Timothy Beck <barricuda1993@yahoo.com>
 */
class Category implements \JsonSerializable {
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

	/**
	 * Category constructor.
	 * @param $categoryId
	 * @param string $categoryType
	 * @throws \InvalidArgumentException | \RangeException | \TypeError | \Exception if setters don't work
	 */
	public function __construct($categoryId,string $categoryType) {
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
	 * @throws if uuid can't validate
	 */
	public function setCategoryId($newCategoryId): void {
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
	 * @return string $categoryType
	 */
	public function getCategoryType(): string {
		return($this->categoryType);
	}

	/**
	 * this is the setter method for categoryType
	 * @param string $newCategoryType
	 * @throws \RangeException if username is too long
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

	//methods
//Insert
	/**
	 * Inserts category to MySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException if MySQL errors occur
	 * @throws \TypeError if $PDO is not a PDO connection object
	 */
	public function insert(\PDO $pdo): void {
		//create query template
		$query = "INSERT INTO category(categoryId, categoryType) VALUES(:categoryId, :categoryType)";
		$statement = $pdo->prepare($query);
		//create parameters for query
		$parameters = [
			"categoryId" => $this->categoryId->getBytes(),
			"categoryType" => $this->categoryType
			];
		$statement->execute($parameters);
	}
//Update
	/**
	 * updates category in MySQL database
	 *
	 *@param \PDO $pdo PDO connection object
	 *@throws \PDOException when MySQL related error occurs
	 *@throws \TypeError if $pdo is not pdo connection object
	 */
	public function update(\PDO $pdo): void {
		//create query template
		$query = "UPDATE category SET categoryId = :categoryId, categoryType = :categoryType WHERE categoryId = :categoryId";
		$statement = $pdo->prepare($query);
		// set parameters to execute query
		$parameters = [
			"categoryId" => $this->categoryId->getBytes(),
			"categoryType" => $this->categoryType
		];
		$statement->execute($parameters);
	}
//Delete
	/**
	 * deletes category from MySQL database
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mysql related errors occur
	 * @throws \TypeError when $pdo is not a PDO object
	 */
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM category WHERE categoryId = :categoryId";
		$statement = $pdo->prepare($query);
		//set parameters to execute query
		$parameters = ["categoryId" => $this->categoryId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * Gets category by category id
	 * @param $pdo
	 * @param $categoryId
	 * @return Category|null
	 * @throws \PDOException if row can't be converted
	 */
	public static function getCategoryByCategoryId($pdo, $categoryId) : ?Category{
		//sanitize uuid
		try {
			$categoryId = self::validateUuid($categoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT categoryId, categoryType FROM category WHERE  categoryId = :categoryId";
		$statement = $pdo->prepare($query);

		//set parameters to execute
		$parameters = ["categoryId" => $categoryId->getBytes()];
		$statement->execute($parameters);
		//grab user from MySQL
		try {
			$category = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$category = new Category($row["categoryId"], $row["categoryType"]);
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
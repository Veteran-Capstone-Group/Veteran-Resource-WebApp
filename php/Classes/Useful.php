<?php

namespace VeteranResource\Resource;

use phpDocumentor\Reflection\Types\Integer;
use Ramsey\Uuid\Uuid;

require_once(dirname(__DIR__) . "/vendor/autoload.php");

/**
 * Creating class Useful, this ia an analog to "likes" that will apply to resources
 * @package VeteranResource\Resource
 *
 * Description: this class will be used to store information on "Usefuls" for the WebApp.
 *
 * @author John Johnson-Rodgers
 */
class Useful implements \JsonSerializable {
	use ValidateUuid;
	/**
	 * usefulResourceId, Foreign key that relates to resourceId, one of two foreign keys, Not Null
	 * @var Uuid usefulResourceId
	 */
	private $usefulResourceId;

	/**
	 * usefulUserId, Foreign key that relates to userId, one of two foreign keys, Not Null
	 * @var Uuid $usefulUserId
	 */
	private $usefulUserId;

	/**
	 * Useful constructor.
	 * @param string|Uuid $newUsefulResourceId Id for the resource the useful is applying to
	 * @param string|Uuid $newUsefulUserId Id for the user who is applying the useful
	 */
	public function __construct($newUsefulResourceId, $newUsefulUserId) {
		try {
			$this->setUsefulResourceId($newUsefulResourceId);
			$this->setUsefulUserId($newUsefulUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accessor for usefulResourceId Not Null
	 * foreign key
	 *
	 * @return Uuid Foreign Key usefulResourceId
	 */
	public function getUsefulResourceId(): Uuid {
		return $this->usefulResourceId;
	}

	/**
	 * Mutator for usefulResourceId Not Null
	 * Foreign Key
	 *
	 * @param string | Uuid $newUsefulResourceId Refers to resourceId, is a foreign key
	 * @throws \Exception if $newUsefulResourceId is an invalid argument, an invalid range, a type error, or another type of exception
	 */
	public function setUsefulResourceId($newUsefulResourceId): void {
		//convert to Uuid or throw exception
		try {
			$uuid = self::validateUuid($newUsefulResourceId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//store usefulResourceId
		$this->usefulResourceId = $uuid;
	}

	/**
	 * Accessor for usefulUserId Not Null
	 * foreign key
	 *
	 * @return Uuid Foreign Key usefulUserId
	 */
	public function getUsefulUserId(): Uuid {
		return $this->usefulUserId;
	}

	/**
	 * Mutator for usefulUserId Not Null
	 * Foreign Key
	 *
	 * @param string|Uuid $newUsefulUserId refers to userId, is a foreign key
	 * @throws \Exception if $newUsefulUserId is an invalid argument, an invalid range, a type error, or another type of exception
	 */
	public function setUsefulUserId($newUsefulUserId): void {
		//convert to Uuid or throw exception
		try {
			$uuid = self::validateUuid($newUsefulUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//store usefulUserId
		$this->usefulUserId = $uuid;
	}


	/**
	 * inserts this Useful into mySQL
	 *
	 * @param \PDO $pdo PDO connection Object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo): void {
		//create query template
		$query = "INSERT INTO useful(usefulResourceId, usefulUserId) VALUES(:usefulResourceId, :usefulUserId)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["usefulResourceId" => $this->usefulResourceId->getBytes(), "usefulUserId" => $this->usefulUserId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * deletes this Useful from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM useful WHERE usefulResourceId = :usefulResourceId AND usefulUserId = :usefulUserId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the placeholder in the template
		$parameters = ["usefulResourceId" => $this->usefulResourceId->getBytes(), "usefulUserId" => $this->usefulUserId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * @param \PDO $pdo
	 * @param string|uuid $usefulResourceId
	 * @return int
	 */
	public static function getUsefulCountByUsefulResourceId(\PDO $pdo, $usefulResourceId): Integer {
		//Validate usefulResourceId
		try {
			$usefulResourceId = self::validateUuid($usefulResourceId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT COUNT (usefulUserId) FROM useful WHERE usefulResourceId = :usefulResourceId";
		$statement = $pdo->prepare($query);
		//bind usefulResourceId to placeholder in mySQL
		$parameters = ["usefulResourceId" => $usefulResourceId->getBytes()];
		$statement->execute($parameters);
		$usefulCount = $statement;
		return $usefulCount;
	}

	/**
	 * method to get Useful by Resource Id, allows unit test and can be used to see who useful'd week 11
	 *
	 * @param \PDO $pdo
	 * @param string|Uuid $usefulResourceId
	 * @return \SplFixedArray
	 */
	public static function getUsefulByUsefulResourceId(\PDO $pdo, $usefulResourceId): \SplFixedArray {
		//Validate usefulResourceId
		try {
			$usefulResourceId = self::validateUuid($usefulResourceId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT usefulResourceId, usefulUserId FROM useful WHERE usefulResourceId = :usefulResourceId";
		$statement = $pdo->prepare($query);
		//bind usefulResourceId to placeholder in mySQL
		$parameters = ["usefulResourceId" => $usefulResourceId->getBytes()];
		$statement->execute($parameters);
		//build an array of usefuls
		$usefuls = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$useful = new Useful($row["usefulResourceId"], $row["usefulUserId"]);
				$usefuls[$usefuls->key()] = $useful;
				$usefuls->next();
			} catch(\Exception $exception) {
				//if the row can't be converted, throw it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($usefuls);
	}

//todo Week 11, Add getUsefulByUserId
	/**
	 * converts Uuids to strings to serialize
	 *
	 * @return array converts Uuids to strings
	 */
	public function jsonSerialize(): array {
		$fields = get_object_vars($this);
		$fields["usefulUserId"] = $this->usefulUserId->toString();
		$fields["usefulResourceId"] = $this->usefulResourceId->toString();
		return ($fields);
	}
}

<?php

namespace VeteranResource\Resource;
use Ramsey\Uuid\Uuid;

require_once (dirname(__DIR__) . "/vendor/autoload.php");

/**
 * Creating class Useful, this ia an analog to "likes" that will apply to resources
 * @package VeteranResource\Resource
 *
 * Description: this class will be used to store information on "Usefuls" for the WebApp.
 *
 * @author John Johnson-Rodgers
 */
class Useful {
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
 * @param $newUsefulResourceId
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
	 * @param $newUsefulUserId
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
	 * converts Uuids to strings to serialize
	 *
	 * @return array converts Uuids to strings
	 */
	public function jsonSerialize() : array {
		$fields = get_object_vars( $this );
		$fields["usefulUserId"] = $this->usefulUserId->toString();
		$fields["usefulResourceId"] = $this->usefulResourceId->toString();
		return($fields);
	}
}
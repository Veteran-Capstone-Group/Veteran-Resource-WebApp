<?php


namespace VeteranResource\Resource;
use Ramsey\Uuid\Uuid;
require_once(dirname(__DIR__) . "/Classes/autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");
/**
 * Creating Class User for generating new users
 *
 * @package VeteranResource\Resource
 * @Author Timothy Beck <dev@timothybeck.com>
 */
class User implements \JsonSerializable {
	use ValidateUuid;
	/**
	 * id for this user, this is the primary key
	 * @var Uuid|string $userId
	 */
private $userId;

/**
 * activationToken for this user;
 * @var string $userActivationToken
 */
private $userActivationToken;

/**
 * Email for this user; this is unique data
 * @var string $userEmail
 */
private $userEmail;

/**
 * Hash for this user;
 * @var string $userHash
 */
private $userHash;

/**
 * Name for this user;
 * @var string $userName
 */
private $userName;

	/**
	 * username for this user, this is unique data
	 * @var string $userUsername
	 */
private $userUsername;

//constructor goes here
	/**
	 * constructor for this user
	 *
	 * @param Uuid|string $newUserId
	 * @param string $newUserActivationToken
	 * @param string $newUserEmail
	 * @param string $newUserHash
	 * @param string $newUserName
	 * @param string $newUserUsername
	 * @throws \InvalidArgumentException if datq is empty or Invalid
	 * @throws \RangeException if data is not the correct length
	 * @throws \TypeError if data types violate type hints
	 */
	//
	public function __construct($newUserId, ?string $newUserActivationToken, string $newUserEmail, string $newUserHash, string $newUserName, string $newUserUsername) {
		try {
			$this->setUserId($newUserId);
			$this->setUserActivationToken($newUserActivationToken);
			$this->setUserEmail($newUserEmail);
			$this->setUserHash($newUserHash);
			$this->setUserName($newUserName);
			$this->setUserUsername($newUserUsername);
		} // determine if and what exception was thrown
		catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

//getters and setters
/**
 * getter method for user Id
 *
 * @return Uuid value of user id
 */
public function getUserId(): Uuid {
	return ($this->userId);
}

/**
 * setter method for userId
 *
 * @param Uuid $newUserId new value of userId
 * @throws \TypeError if $newUserId is not a uuid or string
 */
public function setUserId($newUserId) {
	//verify if userId is valid
	try {
		$uuid = self::validateUuid($newUserId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
	//stores userId
	$this->userId = $uuid;
}

	/**
	 * setter for userEmail
	 *
	 * @return string value of user Email
	 */
public function getUserEmail(): string {
	return ($this->userEmail);
}

	/**
	 * setter method for userEmail
	 *
	 * @param string $newUserEmail
	 * @throws \InvalidArgumentException if email is not a string or is insecure
	 * @throws \RangeException if string is longer than 124 characters
	 * @throws \TypeError if Email is not a string
	 */
public function setUserEmail(string $newUserEmail): void{
	//sanitize email
	$newUserEmail = trim($newUserEmail);
	$newUserEmail = filter_var($newUserEmail, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);
	if(empty($newUserEmail) !== false) {
		throw(new \InvalidArgumentException("This email is not valid"));
	}
	//check if email is valid length
	if(strlen($newUserEmail) > 124) {
		throw(new \RangeException("Email needs to be less than 124 UNICODE characters"));
	}
	//set return new email
	$this->userEmail = $newUserEmail;
}

/**
 * getter method for userActivationToken
 *
 * @return string value of user activation token
 */
public function getUserActivationToken(): string {
	return ($this->userActivationToken);
}

/**
 * setter method for userActivationToken
 *
 * @param string $newUserActivationToken
 * @throws \InvalidArgumentException if token is not a string or insecure
 * @throws \RangeException if token is not exactly 32 chars
 * @throws \TypeError if the token is not a string
 */
public function setUserActivationToken(?string $newUserActivationToken): void {
	//if null return null
	if($newUserActivationToken === null) {
		$this->userActivationToken = null;
		return;
	}
	//checks if token is valid
	$newUserActivationToken = strtolower(trim($newUserActivationToken));
	if(ctype_xdigit($newUserActivationToken) === false) {
		throw(new \InvalidArgumentException('activation token is not valid'));
	}
	//checks if token is 32 characters
	if(strlen($newUserActivationToken) !== 32) {
		throw(new \RangeException('token must be 32 characters in length'));
	}
	//set the valid activation token
	$this->userActivationToken = $newUserActivationToken;
}

/**
 *getter method for userhash
 *
 *@return string value for userHash
 */
public function getUserHash(): string {
	return ($this->userHash);
}

/**
 * setter method for user hash
 *
 * @param string $newUserHAsh
 * @throws \InvalidArgumentException if hash is insecure or invalid or not a bcrypt hash
 * @throws \RangeException if has is not 30 characters
 * @throws \TypeError if hash is not a string
 */
public function setUserHash(string $newUserHash): void {
	//check if hash is empty
	$newUserHash = trim($newUserHash);
	/*if(empty($newUserHash) !== true) {
	throw(new \InvalidArgumentException("hash is insecure or invalid"));
	}*/
	//check type of hash
	$userHashInfo = password_get_info($newUserHash);
	if($userHashInfo["algoName"] !== "argon2i") {
		throw(new \InvalidArgumentException("author hash is not a valid hash"));
	}
	//check character length of hash
	if(strlen($newUserHash) !== 95) {
		throw(new \InvalidArgumentException(strlen($newUserHash)));
	}
	//return hash
	$this->userHash = $newUserHash;
}

/**
 * getter for userName
 *
 * @return string $userName
 */
public function getUserName(): string {
	return ($this->userName);
}

/**
 * setter for userName
 *
 * @param string $newUserName
 * @throws \InvalidArgumentException name is not secure or contains invalid characters
 * @throws \RangeException if name is longer than 64 characters
 * @throws \TypeError if name is not a string
 */
public function setUserName(string $newUserName): void {
	//checks if username is string and sanitizes
	$newUserName = trim($newUserName);
	$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING);
	//checks if username is less than 64 characters
	if(strlen($newUserName) > 64) {
		throw(new \RangeException("Name needs to be shorter than 64 characters"));
	}
	$this->userName = $newUserName;
}

/**
 * getter method for userUserName
 *
 * @return string userUserName
 */
public function getUserUsername(): string {
	return ($this->userUsername);
}

/**
 * setter for userUsername
 *
 * @param string $newUserUsername
 * @throws /InvalidArgumentException if username is insecure or Invalid
 * @throws /RangeException is username is longer than 24 characters
 * @throws /TypeError if username is not a string
 */
public function setUserUsername(string $newUserUsername): void {
	//sanitize string
	$newUserUsername = trim($newUserUsername);
	$newUserUsername = filter_var($newUserUsername, FILTER_SANITIZE_STRING);
	// check is string is >24 characters
	if(strlen($newUserUsername) > 24) {
		throw(new \RangeException("Username must include less than 24 characters"));
	}
	//return new username as username
	$this->userUsername = $newUserUsername;
}

//methods
//Insert
/**
 * Inserts user to MySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException if MySQL errors occur
 * @throws \TypeError if $PDO is not a PDO connection object
 */
public function insert(\PDO $pdo): void {
	//create query template
	$query = "INSERT INTO user(userId, userActivationToken, userEmail, userHash, userName, userUsername) VALUES(:userId, :userActivationToken, :userEmail, :userHash, :userName, :userUsername)";
	$statement = $pdo->prepare($query);
	//create parameters for query
	$parameters = [
		"userId" => $this->userId->getBytes(),
		"userActivationToken" => $this->userActivationToken,
		"userEmail" => $this->userEmail,
		"userHash" => $this->userHash,
		"userName" => $this->userName,
		"userUsername" => $this->userUsername];
	$statement->execute($parameters);
}
//Update
/**
 * updates user in MySQL database
 *
 *@param \PDO $pdo PDO connection object
 *@throws \PDOException when MySQL related error occurs
 *@throws \TypeError if $pdo is not pdo connection object
 */
public function update(\PDO $pdo): void {
	//create query template
	$query = "UPDATE user SET userId = :userId, userActivationToken = :userActivationToken, userEmail = :userEmail, userHash = :userHash, userName = :userName, userUsername = :userUsername WHERE userId = :userId";
	$statement = $pdo->prepare($query);
	// set parameters to execute query
	$parameters = [
		"userId" => $this->userId->getBytes(),
		"userActivationToken" => $this->userActivationToken,
		"userEmail" => $this->userEmail,
		"userHash" => $this->userHash,
		"userName" => $this->userName,
		"userUsername" => $this->userUsername];
	$statement->execute($parameters);
}
//Delete
/**
 * deletes user from MySQL database
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mysql related errors occur
 * @throws \TypeError when $pdo is not a PDO object
 */
public function delete(\PDO $pdo): void {
	//create query template
	$query = "DELETE FROM user WHERE userId = :userId";
	$statement = $pdo->prepare($query);
	//set parameters to execute query
	$parameters = ["userId" => $this->userId->getBytes()];
	$statement->execute($parameters);
}
//PDO getFOObyBAR methods

	/**
	 * get user information by username
	 *
	 * @param \PDO $pdo
	 * @param string $userUsername
	 * @throws \PDOException when mysql related errors occur
	 * @throws \TypeError when $pdo is not a PDO object
	 */
public static function getUserByUserUsername(\PDO $pdo, string $userUsername) {
	//sanitize username
	$userUsername = trim($userUsername);
	$userUsername = filter_var($userUsername, FILTER_SANITIZE_STRING);
	//create query template
	$query = "SELECT userId, userActivationToken, userEmail, userHash, userName, userUsername FROM user WHERE userUsername = :userUsername";
	$statement = $pdo->prepare($query);
	//set parameters to execute
	$parameters = ["userUsername" => $userUsername];
	$statement->execute($parameters);
	//grab user from MySQL
	try {
		$user = null;
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		$row = $statement->fetch();
		if($row !== false) {
			$user = new User($row["userId"], $row["userActivationToken"], $row["userEmail"], $row["userHash"], $row["userName"], $row["userUsername"]);
		}
	} catch(\Exception $exception) {
		//if row can't be converted rethrow it
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}
	return($user);
}

	/**
	 * get user information by userId
	 *
	 * @param \PDO $pdo
	 * @param Uuid or string $userId
	 * @throws \PDOException when mysql related errors occur
	 * @throws \TypeError when variable doesn't follow typehints
	 */
	public static function getUserByUserId(\PDO $pdo, $userId): ?User {
		//sanitize uuid
		try {
			$userId = self::validateUuid($userId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//create query template
		$query = "SELECT userId, userActivationToken, userEmail, userHash, userName, userUsername FROM user WHERE userId = :userId";
		$statement = $pdo->prepare($query);
		//set parameters to execute

		$parameters = ["userId" => $userId->getBytes()];
		$statement->execute($parameters);
		//grab user from MySQL
		try {
			$user = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();

			if($row !== false) {
				$user = new User($row["userId"], $row["userActivationToken"], $row["userEmail"], $row["userHash"], $row["userName"], $row["userUsername"]);
			}
		} catch(\Exception $exception) {
			//if row can't be converted rethrow it
			throw(new \PDOException($exception->getMessage(),0, $exception));
		}
		return($user);
	}

	/**
	 * get user information by userActivationToken
	 *
	 * @param \PDO $pdo
	 * @param string userActivationToken
	 * @throws \PDOException when mysql related errors occur
	 * @throws \TypeError when variable doesn't follow typehints
	 * @throws \InvalidArgumentException when activation token is not a hex variable
	 * @throws \RangeException if token is not 32 characters
	 */
	public static function getUserByUserActivationToken(\PDO $pdo, string $userActivationToken) {
		//sanitize activationToken
		if($userActivationToken === null) {
			throw(new\TypeError("token is null"));
		}
		//checks if token is valid
		$userActivationToken = strtolower(trim($userActivationToken));
		if(ctype_xdigit($userActivationToken) === false) {
			throw(new \InvalidArgumentException('activation token is not valid'));
		}
		//checks if token is 32 characters
		if(strlen($userActivationToken) !== 32) {
			throw(new \RangeException('token must be 32 characters in length'));
		}
		//create query template
		$query = "SELECT userId, userActivationToken, userEmail, userHash, userName, userUsername FROM user WHERE userActivationToken = :userActivationToken";
		$statement = $pdo->prepare($query);
		//set parameters to execute
		$parameters = ["userActivationToken" => $userActivationToken];
		$statement->execute($parameters);
		//grab user from MySQL
		try {
			$user = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row =$statement->fetch();
			if($row !== false) {
				$user = new User($row["userId"], $row["userActivationToken"], $row["userEmail"], $row["userHash"], $row["userName"], $row["userUsername"]);
			}
		} catch(\Exception $exception) {
			//if row can't be converted rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($user);
	}
	//JsonSerialize
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);
		$fields["userId"] = $this->userId->toString();
		return($fields);
	}
}
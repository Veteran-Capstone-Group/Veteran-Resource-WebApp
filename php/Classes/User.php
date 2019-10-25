<?php


namespace VeteranResource\Resource;
use http\Exception\BadQueryStringException;
use Ramsey\Uuid\Uuid;
/**
 * Creating Class User for generating new users
 *
 * @package VeteranResource\Resource
 * @Author Timothy Beck <barricuda1993@yahoo.com>
 */
class User {
	use ValidateUuid;
	/**
	 * id for this user, this is the primary key
	 * @var Uuid $userId
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
		$this->userActivationToken =null;
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
 * @throws \InvalidArgumentException if hash is insecure or invalid
 * @throws \RangeException if has is not x characters
 * @throws \TypeError if hash is not a string
 */
public function setUserHash(string $newUserHash): void {
	//check if hash is empty

	//check if hash is hexi

	//check type of hash

	//check character length of hash

}















//methods


	//JsonSerialize
}
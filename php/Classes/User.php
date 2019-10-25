<?php


namespace VeteranResource\Resource;
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

}


//methods


	//JsonSerialize
}
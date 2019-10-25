<?php


namespace VeteranResource\Resource;

/**
 * Creating Class User for generating new users
 *
 * @package VeteranResource\Resource
 * @Author Timothy Beck <barricuda1993@yahoo.com>
 */
class User {
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

	//JsonSerialize
}
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

}
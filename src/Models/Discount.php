<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * A list of discounts applied to the line item.
 * Each discount should be subtracted from the total amount payable for the item.
 */
class Discount extends DataTransferObject
{
	/**
	 * Possible length: <= 100 characters
	 *
	 * The specific name or label of the discount applied to the line item.
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * The monetary value of the discount.
	 *
	 * @var int $amount
	 */
	public int $amount;

}

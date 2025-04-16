<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class Quantity extends DataTransferObject
{
	/**
	 * The number of units of the line item.
	 *
	 * @var float
	 */
	public float $value;

	/**
	 * Possible length: <= 100 characters
	 *
	 * The measurement unit for the quantity, such as cm, or kg.
	 * 
	 * @var ?string $unit
	 */
	public ?string $unit;
}

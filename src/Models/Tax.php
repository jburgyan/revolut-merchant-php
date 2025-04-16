<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * A list of taxes applied to the line item. Each tax should be added to the total amount payable for the item.
 */
class Tax extends DataTransferObject
{
	/**
	 * The specific name or designation of the tax applied to the line item.
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * The monetary value of the tax in minor currency units (e.g., cents for EUR).
	 *
	 * @var int $amount
	 */
	public int $amount;

}

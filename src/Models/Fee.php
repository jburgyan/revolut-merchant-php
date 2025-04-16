<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * The details of an order fee.
 */
class Fee extends DataTransferObject
{
	/**
	 * Possible values: [fx, acquiring]
	 *
	 * The type of the order fee.
	 *
	 * @var string|null $type
	 */
	public ?string $type;

	/**
	 * The amount of the payment fee (minor currency unit). For example, enter 7034 for €70.34 in the field.
	 *
	 * @var int|null $amount
	 */
	public ?int $amount;

	/**
	 * The currency of the payment fee. ISO 4217 currency code in upper case.
	 * info
	 *
	 * For more information about the supported currencies, see: Help Center.
	 *
	 * @var string|null $currency
	 */
	public ?string $currency;
}

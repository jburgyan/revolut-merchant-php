<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * The details of the payment method.
 */
class MethodDetails extends DataTransferObject
{
	/**
	 * Possible length: >= 6 characters and <= 6 characters
	 *
	 * The BIN of the payment card.
	 *
	 * @var string|null
	 */
	public ?string $bin;

	/**
	 * Possible length: >= 4 characters and <= 4 characters
	 *
	 * The last four digits of the payment card.
	 *
	 * @var string|null
	 */
	public ?string $last4;

	/**
	 * The expiry month of the payment card.
	 *
	 * @var int|null $expiry_month
	 */
	public ?int $expiry_month;

	/**
	 * The expiry year of the payment card.
	 *
	 * @var int|null
	 */
	public ?int $expiry_year;

	/**
	 * The name of the cardholder.
	 *
	 * @var string|null
	 */
	public ?string $cardholder_name;

	/**
	 * The billing address of the payment method.
	 *
	 * @var Address|null
	 */
	public ?Address $billing_address;


}

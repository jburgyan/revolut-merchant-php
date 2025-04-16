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
	 * @var string|null $bin
	 */
	public ?string $bin;

	/**
	 * Possible length: >= 4 characters and <= 4 characters
	 *
	 * The last four digits of the payment card.
	 *
	 * @var string|null $last4
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
	 * @var int|null $expiry_year
	 */
	public ?int $expiry_year;

	/**
	 * The name of the cardholder.
	 *
	 * @var string|null $cardholder_name
	 */
	public ?string $cardholder_name;

	/**
	 * The billing address of the payment method.
	 *
	 * @var Address|null $billing_address
	 */
	public ?Address $billing_address;

	/**
	 * Possible values: [VISA, MASTERCARD, MAESTRO]
	 *
	 * The brand of the payment card.
	 *
	 * @var string|null $brand
	 */
	public ?string $brand;

	/**
	 * Possible values: [DEBIT, CREDIT, PREPAID, DEFERRED_DEBIT, CHARGE]
	 *
	 * The funding type of the payment card.
	 *
	 * @var string|null $funding
	 */
	public ?string $funding;

	/**
	 * The issuer of the payment card.
	 *
	 * @var string|null $issuer
	 */
	public ?string $issuer;

	/**
	 * Two-letter country code of the country where the payment card was issued.
	 *
	 * @var string|null $issuer_country
	 */
	public ?string $issuer_country;

	/**
	 * The date and time the payment card was added.
	 *
	 * @var string|null $created_at
	 */
	public ?string $created_at;


}

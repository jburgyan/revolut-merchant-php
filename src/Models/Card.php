<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;


class Card extends PaymentMethod
{

	/**
	 * The type of payment method used to pay for the order.
	 *
	 * @var string
	 */
	public string $type = 'card';

	/**
	 * Possible values: [visa, mastercard, american_express]
	 *
	 * The type of the card.
	 *
	 * @var string $card_brand
	 */
	public string $card_brand;

	/**
	 * Possible values: [credit, debit, prepaid]
	 *
	 * The type of card funding.
	 *
	 * @var string|null $funding
	 */
	public ?string $funding;

	/**
	 * The 2-letter country code of the country where the card was issued.
	 *
	 * @var string|null $card_country_code
	 */
	public ?string $card_country_code;

	/**
	 * Possible length: >= 6 characters and <= 6 characters
	 *
	 * The BIN of the card.
	 *
	 * @var string|null
	 */
	public ?string $card_bin;

	/**
	 * Possible length: >= 4 characters and <= 4 characters
	 *
	 * The last four digits of the card number.
	 *
	 * @var string|null $card_last_four
	 */
	public ?string $card_last_four;

	/**
	 * The expiry date of the card in the format of MM/YY.
	 *
	 * @var string|null $card_expiry
	 */
	public ?string $card_expiry;

	/**
	 * The name of the cardholder.
	 *
	 * @var string|null $cardholder_name
	 */
	public ?string $cardholder_name;

	/**
	 * The details of the check for card payment. Only for orders with successful payments.
	 *
	 * @var Checks|null $checks
	 */
	public ?Checks $checks;

}

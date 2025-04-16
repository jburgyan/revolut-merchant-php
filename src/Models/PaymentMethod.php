<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;


use Spatie\DataTransferObject\DataTransferObject;

/**
 * When you use this request to update a customer's payment method,
 * the payment method can't be used for merchant initiated transactions (MIT) any more.
 * This payment method can be used only when the customer is on the checkout page.
 */
class PaymentMethod extends DataTransferObject
{
	/**
	 * The ID of the payment method.
	 *
	 * @var int|null
	 */
	public ?int $id;

	/**
	 * Possible values: [apple_pay, card, google_pay, revolut_pay_card, revolut_pay_account]
	 *
	 * The type of payment method used to pay for the order.
	 *
	 * Available values:
	 * Payment method type    Description
	 * apple_pay    The customer paid the order using Apple Pay.
	 * card    The customer paid the order using their credit or debit card.
	 * google_pay    The customer paid the order using Google Pay.
	 * revolut_pay_card    The customer paid the order via Revolut Pay using their credit or debit card.
	 * revolut_pay_account    The customer paid the order via Revolut Pay using their Revolut account.
	 *
	 * @var string $type
	 */
	public string $type;

}

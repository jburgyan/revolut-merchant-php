<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;


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
	 * Possible values: [CARD, REVOLUT_PAY]
	 *
	 * The type of the payment method.
	 * note
	 *
	 * Only merchant initiated transactions are supported for saved REVOLUT_PAY payment methods.
	 *
	 * @var string|null
	 */
	public ?string $type;

	/**
	 * Possible values: [CUSTOMER, MERCHANT]
	 *
	 * Indicates in which case this saved payment method can be used for payments.
	 *
	 * CUSTOMER: This payment method can be used only when the customer is on the checkout page.
	 * MERCHANT: This payment method can be used without the customer being on the checkout page,
	 * and the merchant can initiate transactions, for example, to take payments for recurring transactions.
	 *
	 * @var string|null
	 */
	public ?string $saved_for;

	/**
	 * @var MethodDetails|null
	 */
	public ?MethodDetails $method_details;
}

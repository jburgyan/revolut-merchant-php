<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * A customer's payment method
 */
class CustomerPaymentMethod extends DataTransferObject
{
	/**
	 * The ID of the payment method.
	 *
	 * @var string $id
	 */
	public string $id;

	/**
	 * Possible values: [CARD, REVOLUT_PAY]
	 *
	 * The type of the payment method.
	 * note
	 *
	 * Only merchant initiated transactions are supported for saved REVOLUT_PAY payment methods.
	 *
	 * @var string|null $type
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
	 * @var string|null $saved_for
	 */
	public ?string $saved_for;

	/**
	 * The details of the payment method.
	 *
	 * @var MethodDetails|null $method_details
	 */
	public ?MethodDetails $method_details;
}

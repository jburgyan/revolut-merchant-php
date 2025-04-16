<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Order created
 */
class Order extends DataTransferObject
{
	/**
	 * Permanent order ID used to retrieve, capture, cancel, or refund an order after authorization.
	 *
	 * @var string|null $id
	 */
	public ?string $id;

	/**
	 * Temporary ID for the order, which expires when the payment is authorised.
	 *
	 * The order token is used to initialise the Revolut Checkout widget, and to be returned by the createOrder
	 * callback on the Revolut Pay widget and Apple Pay and Google Pay widget.
	 *
	 * @var string|null $token
	 */
	public ?string $token;

	/**
	 * Possible values: [payment, payment_request, refund, chargeback, chargeback_reversal, credit_reimbursement]
	 *
	 * The type of the order.
	 *
	 * @var string|null $type
	 */
	public ?string $type;

	/**
	 * Possible values: [pending, processing, authorised, completed, cancelled, failed]
	 *
	 * The state of the order.
	 * info
	 *
	 * For more information about the order lifecycle, see: Order and payment lifecycle.
	 * @var string|null $state
	 */
	public ?string $state;

	/**
	 * The date and time the order was created.
	 *
	 * @var string|null $created_at
	 */
	public ?string $created_at;

	/**
	 * The date and time the order was last updated.
	 *
	 * @var string $updated_at
	 */
	public string $updated_at;

	/**
	 * The description of the order.
	 *
	 * @var string|null $description
	 */
	public ?string $description;

	/**
	 * Possible values: [automatic, manual]
	 *
	 * Default value: automatic
	 *
	 * The capture mode of the order. automatic is used by default.
	 *
	 * automatic    The order is captured automatically after payment authorisation.
	 * manual    The order is not captured automatically. You must manually capture the order later.
	 *
	 * info: For more information, see Capture an order.
	 *
	 * @var string $capture_mode
	 */
	public string $capture_mode = 'automatic';

	/**
	 * Automatic cancellation period for uncaptured orders, specified in ISO 8601 format.
	 *
	 * Orders in authorised state will be automatically cancelled if they stay uncaptured for longer than the period specified. Maximum: 7 days = P7D.
	 * note
	 *
	 * The following limitations apply:
	 *
	 * Cannot be a negative value.
	 *
	 * Cannot be updated if the new value is less than or equal to the elapsed time since authorisation.
	 *
	 * Failing scenario:
	 * Original value: 7 days
	 * Time since authorisation: 3 days
	 * Update value: 2 days
	 *
	 * In this scenario, an error is returned.
	 *
	 * Successful scenario:
	 * Original value: 7 days
	 * Time since authorisation: 3 days
	 * Update value: 4 days
	 *
	 * In this scenario, the parameter can be updated.
	 *
	 * Cannot be updated if cancellation is ≤ 30 minutes away.
	 *
	 * Failing scenario:
	 * Original value: 12 hours
	 * Time since authorisation: 11 hours 40 minutes
	 *
	 * In this scenario, an error is returned.
	 *
	 * Successful scenario:
	 * Original value: 12 hours
	 * Time since authorisation: 11 hours 20 minutes
	 *
	 * In this scenario, the parameter can be updated.
	 *
	 * @var string|null $cancel_authorised_after
	 */
	public ?string $cancel_authorised_after;

	/**
	 * The order total expressed in minor currency units, according to the ISO 4217 standard.
	 * For example, 7034 in EUR corresponds to €70.34.
	 * info
	 *
	 * Conversion between major and minor units varies by currency. For instance, 100 minor units equal £1.00 in GBP, whereas in ISK they represent 100 units. For more details, see the ISO 4217 standard.
	 * note
	 *
	 * If line_items are provided, the order amount must equal the sum of all line items' total_amount.
	 *
	 * @var int|null $amount
	 */
	public ?int $amount;

	/**
	 * The amount not yet paid for a given order (in minor currency units). For example, 7034 represents €70.34.
	 *
	 * The value in this field may differ from amount if there are partial payments associated with the order.
	 *
	 * @var int|null $outstanding_amount
	 */
	public ?int $outstanding_amount;

	/**
	 * The amount that was refunded from the order (in minor currency units). For example, 7034 represents €70.34.
	 *
	 * This applies to orders that have been refunded (i.e., orders of type payment that have a related refund order).
	 *
	 * @var int|null $refunded_amount
	 */
	public ?int $refunded_amount;

	/**
	 * ISO 4217 currency code in upper case.
	 * info
	 *
	 * For more information about the supported currencies, see: Help Center.
	 *
	 * @var string|null $currency
	 */
	public ?string $currency;

	/**
	 * ISO 4217 currency code in upper case.
	 *
	 * If settlement_currency is different from the value of currency, the money will be exchanged when the amount is settled to your merchant account. In case of a refund or chargeback, the money will be exchanged to the order's initial currency.
	 *
	 * If settlement_currency is not specified, this value is taken from currency.
	 * info
	 *
	 * For more information about the supported currencies, see: Help Center.
	 *
	 * @var string|null $settlement_currency
	 */
	public ?string $settlement_currency;

	/**
	 * Object containing information about a customer.
	 *
	 * If you have it, we strongly advise providing at least either id, phone, or email.
	 *
	 * Using the Customers operations, you can manage customer instances.
	 *
	 * The following behaviours apply to different use cases:
	 * Use case    API behavior
	 * Existing customer    If id was provided, we ignore other customer details and associate the customer with the order.
	 *
	 * If either email, phone, or full_name was provided (without an existing customer's id),
	 * we always create a new customer, irrespective of another, existing customer object having the same details.
	 * New customer    If either email, phone, or full_name was provided, we create a new customer,
	 * irrespective of another customer object having the same details.
	 *
	 * If id of a non-existent customer was provided, we return a 404 error, irrespective of other details provided.
	 *
	 * @var Customer|null $customer
	 */
	public ?Customer $customer;

	/**
	 * The details of all the payments that have been made towards this order (successful or unsuccessful).
	 *
	 * @var Payment[]|null
	 */
	public ?array $payments;

}

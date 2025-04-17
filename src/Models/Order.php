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

	/**
	 * Unique ID representing the location where merchants sells products.
	 * note
	 *
	 * Currently, only online locations are supported.
	 * info
	 *
	 * For more information, see: Locations.
	 *
	 * @var string|null $location_id
	 */
	public ?string $location_id;

	/**
	 * Possible number of items: <= 50 items
	 *
	 * Additional information to track your orders in your system, by providing custom metadata using "<key>" : "<value>" pairs.
	 * caution
	 *
	 * Restrictions:
	 *
	 * Max number of items: 50
	 * Max length of metadata values: 500
	 * Format of metadata keys: ^[a-zA-Z][a-zA-Z\\d_]{0,39}$
	 *
	 * @var array|null $metadata
	 */
	public ?array $metadata;

	/**
	 * Object containing industry-specific information associated with the order.
	 *
	 * @var IndustryData|null $industry_data
	 */
	public ?IndustryData $industry_data;

	/**
	 * Object for providing additional information stored in the merchant's order management system.
	 *
	 * @var MerchantOrderData|null
	 */
	public ?MerchantOrderData $merchant_order_data;

	/**
	 * Object containing information about upcoming payments associated with the order.
	 *
	 * @var UpcomingPaymentData|null $upcoming_payment_data
	 */
	public ?UpcomingPaymentData $upcoming_payment_data;

	/**
	 * Link to a checkout page hosted by Revolut.
	 *
	 * @var string|null $checkout_url
	 */
	public ?string $checkout_url;

	/**
	 * Pattern: Value must match regular expression ^https:\/{2}.+/gi
	 *
	 * The URL your customer will be redirected to after completing a payment on the hosted checkout page
	 * (checkout_url parameter's value of the order).
	 * info
	 *
	 * For more information on how to use the redirect_url, see: Custom redirection via the API
	 *
	 * @var string|null $redirect_url
	 */
	public ?string $redirect_url;

	/**
	 * Details about the shipping related to the order, including address, contact information, and individual shipments.
	 * info
	 *
	 * Required for retail merchants.
	 * Omitting this information may trigger additional scrutiny and risk mitigation actions by the Revolut risk team.
	 *
	 * @var Shipping|null
	 */
	public ?Shipping $shipping;

	/**
	 * Possible values: [automatic, forced]
	 *
	 * Default value: automatic
	 *
	 * The enforce challenge mode. automatic is used by default.
	 * automatic
	 * The payments created for an order will have challenge requirement calculated by our fraud mechanisms.
	 * Not all payments will trigger a 3DS challenge.
	 * forced
	 * The payments created for an order will always require a 3DS challenge. Currently only supported for card payments.
	 *
	 * @var string|null $enforce_challenge
	 */
	public ?string $enforce_challenge = 'automatic';

	/**
	 * Possible number of items: <= 250 items
	 *
	 * An array of line items included in the order.
	 * Each line item represents an individual product or service, along with its quantity, price, taxes, and discounts.
	 * info
	 *
	 * Required for retail merchants.
	 * Omitting this information may trigger additional scrutiny and risk mitigation actions by the Revolut risk team.
	 *
	 * @var LineItem[]|null $line_items
	 */
	public ?array $line_items;

	/**
	 * Possible length: non-empty and <= 19 characters
	 * Pattern: Value must match regular expression ^[^*\n\r\\]+$
	 *
	 * You can set a dynamic statement descriptor for your orders by providing a custom suffix.
	 *
	 * A statement descriptor is the text shown on cardholders' bank or card statements, helping them recognise a transaction or merchant. This field can be used to send extra information with the statement descriptor for card transactions.
	 *
	 * The complete descriptor is built using the following format: {base}*{suffix}, where:
	 *
	 * {base} is the existing descriptor configured in the Revolut Business dashboard (Settings > Business account > Merchant profile > Statement descriptor).
	 * {suffix} is defined by the statement_descriptor_suffix field.
	 *
	 * note
	 *
	 * If the combined descriptor's length (base + suffix) exceeds the character limits of card scheme providers, the final value will be truncated. For example if the limit is 22 characters, the base descriptor is "base" and the suffix is "testdescriptorsuffix", the final descriptor becomes "base*testdescriptorsuf".
	 * The final statement descriptor shown on a cardholder's statement may vary by issuing bank, as some banks apply their own custom formatting or truncation rules.
	 *
	 * @var string|null $statement_descriptor_suffix
	 */
	public ?string $statement_descriptor_suffix;

}

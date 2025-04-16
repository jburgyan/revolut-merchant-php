<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Flowwow\RevolutMerchant\Responses\Customer;
use Flowwow\RevolutMerchant\Responses\IndustryData;
use Flowwow\RevolutMerchant\Responses\LineItem;
use Flowwow\RevolutMerchant\Responses\MerchantOrderData;
use Flowwow\RevolutMerchant\Responses\Shipping;
use Flowwow\RevolutMerchant\Responses\UpcomingPaymentData;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Create an Order object.
 *
 * Creating orders is one of the basic operations of the Merchant API.
 * Most of the other operations are related to creating orders. Furthermore,
 * the payment methods merchants can use to take payments for their orders are also built on order creation.
 */
class OrderCreate extends DataTransferObject
{
	/**
	 * The order total expressed in minor currency units, according to the ISO 4217 standard.
	 * For example, 7034 in EUR corresponds to €70.34.
	 * @var int
	 */
	public int $amount;

	/**
	 * ISO 4217 currency code in upper case. https://en.wikipedia.org/wiki/ISO_4217
	 * @var string
	 */
	public string $currency;

	/**
	 * ISO 4217 currency code in upper case.
	 *
	 * If settlement_currency is different from the value of currency, the money will be exchanged when the amount is settled to your merchant account. In case of a refund or chargeback, the money will be exchanged to the order's initial currency.
	 *
	 * If settlement_currency is not specified, this value is taken from currency.
	 * @var string|null
	 */
	public ?string $settlement_currency;

	/**
	 * The description of the order.
	 * @var string|null
	 */
	public ?string $description;

	/**
	 * Object containing information about a customer.
	 *
	 * If you have it, we strongly advise providing at least either id, phone, or email.
	 *
	 * Using the Customers operations, you can manage customer instances.
	 * @var Customer|null
	 */
	public ?Customer $customer;

	/**
	 * Possible values: [automatic, forced]
	 *
	 * Default value: automatic
	 *
	 * The enforce challenge mode. automatic is used by default.
	 *
	 * @var string|null
	 */
	public ?string $enforce_challenge;

	/**
	 * Possible number of items: <= 250 items
	 *
	 * An array of line items included in the order. Each line item represents an individual product or service, along with its quantity, price, taxes, and discounts.
	 * info
	 *
	 * Required for retail merchants. Omitting this information may trigger additional scrutiny and risk mitigation actions by the Revolut risk team.
	 *
	 * @var LineItem[]|null
	 */
	public ?array $line_items;

	/**
	 * Details about the shipping related to the order, including address, contact information, and individual shipments.
	 * info
	 *
	 * Required for retail merchants. Omitting this information may trigger additional scrutiny and
	 * risk mitigation actions by the Revolut risk team.
	 *
	 * @var Shipping|null
	 */
	public ?Shipping $shipping;

	/**
	 * Possible values: [automatic, manual]
	 *
	 * Default value: automatic
	 *
	 * The capture mode of the order. automatic is used by default.
	 *
	 * @var string|null $capture_mode
	 */
	public ?string $capture_mode;

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
	 * @var string|null $cancel_authorized_after
	 */
	public ?string $cancel_authorized_after;

	/**
	 * Unique ID representing the location where merchants sells products.
	 * note
	 *
	 * Currently, only online locations are supported.
	 * info
	 *
	 * For more information, see: Locations.
	 *
	 * @var string|null
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
	 * @var array|null
	 */
	public ?array $metadata;

	/**
	 * Object containing industry-specific information associated with the order.
	 * info
	 *
	 * In the following cases, industry-specific info is required.
	 * Omitting this information may trigger additional scrutiny and risk mitigation actions by the Revolut risk team.
	 *
	 * @var IndustryData|null
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
	 * @var UpcomingPaymentData|null
	 */
	public ?UpcomingPaymentData $upcoming_payment_data;

	/**
	 * @var string
	 */
	public string $redirect_url;

	/**
	 * @var string
	 */
	public string $statement_descriptor_suffix;

}

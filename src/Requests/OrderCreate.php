<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Flowwow\RevolutMerchant\Resources\CustomerResource;
use Flowwow\RevolutMerchant\Responses\Customer;
use Flowwow\RevolutMerchant\Responses\LineItem;
use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class OrderCreate extends DataTransferObject
{
	/**
	 * The order total expressed in minor currency units, according to the ISO 4217 standard.
	 * For example, 7034 in EUR corresponds to €70.34.
	 * @var int
	 */
	public int     $amount;

	/**
	 * ISO 4217 currency code in upper case. https://en.wikipedia.org/wiki/ISO_4217
	 * @var string
	 */
	public string  $currency;

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
	 * @var string|null
	 */
	public ?string $capture_mode;
	/**
	 * @var string|null
	 */
	public ?string $merchant_order_ext_ref;
	/**
	 * @var string|null
	 */
	public ?string $email;


	/**
	 * @var string|null
	 */
	public ?string $customer_id;
    //$shipping_address
}

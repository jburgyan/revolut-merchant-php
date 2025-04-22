<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class OrderRefund extends DataTransferObject
{
	/**
	 * The amount of the refund (minor currency unit). For example, enter 7034 for €70.34 in the field.
	 *
	 * This amount can't exceed the remaining amount of the original order.
	 * To get the refundable amount, subtract the value of the refunded_amount from the value of
	 * the order_amount in the original order. See Retrieve an order.
	 *
	 * @var int $amount
	 */
	public int $amount;

	/**
	 * The description of the refund.
	 *
	 * @var string|null $description
	 */
	public ?string $description;

	/**
	 * Merchant order ID for external reference.
	 *
	 * Use this field to set the ID that your own system can use to easily track orders.
	 *
	 * @var string|null
	 */
	public ?string $merchant_order_ext_ref;

	/**
	 * Possible number of items: <= 50 items
	 *
	 * Additional information to track your orders in your system, by providing custom metadata
	 * using "<key>" : "<value>" pairs.
	 * caution
	 *
	 * Restrictions:
	 *
	 * Max number of items: 50
	 * Max length of metadata values: 500
	 * Format of metadata keys: ^[a-zA-Z][a-zA-Z\\d_]{0,39}$
	 * @var array|null
	 */
	public ?array $metadata;

}

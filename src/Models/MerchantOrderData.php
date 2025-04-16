<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Object for providing additional information stored in the merchant's order management system.
 */
class MerchantOrderData extends DataTransferObject
{
	/**
	 * Possible length: <= 2000 characters
	 *
	 * The URL of the order stored in the merchant's order management system.
	 *
	 * This URL will be included in the order confirmation email for payments made via Revolut Pay. If specified, this URL will override the default link to the merchant's Business website configured in the Revolut Business account.
	 * caution
	 *
	 * Restrictions:
	 *
	 * Max length of url string: 2000
	 * Only valid http:// or https:// domains are accepted
	 * Domain cannot be localhost or IP address
	 *
	 * @var string|null $url
	 */
	public ?string $url;

	/**
	 * Merchant order ID for external reference.
	 *
	 * Use this field to set the ID that your own system can use to easily track orders.
	 *
	 * @var string|null $reference
	 */
	public ?string $reference;

}

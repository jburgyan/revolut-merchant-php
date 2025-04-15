<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Required for retail merchants.
 * Omitting this information may trigger additional scrutiny and risk mitigation actions by the Revolut risk team.
 */
class LineItem extends DataTransferObject
{
	/**
	 * Possible length: <= 250 characters
	 *
	 * Name of the line item.
	 *
	 * @var string
	 */
	public string $name;

	/**
	 * Possible values: [physical, service]
	 *
	 * Type of the line item.
	 *
	 * @var string
	 */
	public string $type;

	/**
	 * Object representing the quantity details of a line item,
	 * including the amount and its associated unit of measurement.
	 *
	 * @var Quantity[]
	 */
	public array $quantity;

	/**
	 * The unit price of the line item.
	 *
	 * @var int
	 */
	public int $unit_price_amount;

	/**
	 * The total amount to be paid for the line item, including taxes and discounts.
	 *
	 * @var int
	 */
	public int $total_amount;

	/**
	 * Possible length: <= 250 characters
	 *
	 * Unique identifier of line item in the merchant's system.
	 *
	 * @var string|null
	 */
	public ?string $external_id;

	/**
	 * Possible number of items: <= 50 items
	 *
	 * A list of discounts applied to the line item. Each discount should be subtracted from the total amount payable for the item.
	 *
	 * @var Discount[]|null $discounts
	 */
	public ?array $discounts;

	/**
	 * Possible number of items: <= 50 items
	 *
	 * A list of taxes applied to the line item. Each tax should be added to the total amount payable for the item.
	 *
	 * @var Tax[]|null $taxes
	 */
	public ?array $taxes;

	/**
	 * Possible number of items: <= 50 items
	 *
	 * A list of URLs pointing to images related to the line item. These images can provide visual details or representations of the item.
	 *
	 * @var string[]|null $image_urls
	 */
	public ?array $image_urls;

	/**
	 * Possible length: <= 1024 characters
	 *
	 * Description of the line item.
	 *
	 * @var string|null $description
	 */
	public ?string $description;

	/**
	 * Possible length: <= 2000 characters
	 *
	 * An HTTP/HTTPS URL that links to more information about the line item, such as a product page or details.
	 *
	 * Restrictions:
	 *
	 * Max length: 2000
	 * Only valid http:// or https:// domains are accepted
	 * Domain cannot be localhost or IP address
	 *
	 * @var string|null $url
	 */
	public ?string $url;
}

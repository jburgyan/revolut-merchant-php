<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * A list of discounts applied to the line item.
 * Each discount should be subtracted from the total amount payable for the item.
 */
class IndustryData extends DataTransferObject
{
	/**
	 * Possible length: <= 100 characters
	 *
	 * The specific name or label of the discount applied to the line item.
	 *
	 * @var string $type
	 */
	public string $type = 'event';

	/**
	 * A unique identifier provided by the merchant associated with the order.
	 *
	 * This booking_id is used to reference and correlate booking information with the Merchant API
	 * and the merchant's internal system.
	 *
	 * @var string $booking_id
	 */
	public string $booking_id;

	/**
	 * A list of events associated with the booking.
	 *
	 * @var Event[]|null
	 */
	public ?array $events;

}

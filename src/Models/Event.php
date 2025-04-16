<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * A list of discounts applied to the line item.
 * Each discount should be subtracted from the total amount payable for the item.
 */
class Event extends DataTransferObject
{
	/**
	 * ISO 8601 date and time when the event starts.
	 *
	 * @var string|null $start_date
	 */
	public ?string $start_date;

	/**
	 * ISO 8601 date and time when the event ends.
	 *
	 * @var ?string $end_date
	 */
	public ?string $end_date;

	/**
	 * ISO 8601 date and time when the funds are released to merchants.
	 *
	 * @var ?string $supplier_payment_date
	 */
	public ?string $supplier_payment_date;

	/**
	 * The name of the event.
	 *
	 * @var ?string $name
	 */
	public ?string $name;

	/**
	 * The address of the event location.
	 *
	 * @var Address|null $location
	 */
	public ?Address $location;

	/**
	 * Possible values: [concert, conference, convention, exhibition, festival, party, performance, other]
	 *
	 * The type of the event.
	 *
	 * @var string|null $category
	 */
	public ?string $category;

	/**
	 * Possible values: [primary, secondary]
	 *
	 * Indicates the relationship between the ticket vendor and the event organiser.
	 *
	 * @var string|null $market
	 */
	public ?string $market = 'primary';

	/**
	 * A list of tickets associated with the booking.
	 *
	 * @var Ticket[]|null $tickets
	 */
	public ?array $tickets;

}

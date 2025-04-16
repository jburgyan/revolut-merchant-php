<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

class Ticket extends DataTransferObject
{
	/**
	 * A unique identifier provided by the merchant associated with the ticket.
	 *
	 * @var string $id
	 */
	public string $id;

	/**
	 * Indicates whether the ticket is transferable to another buyer.
	 *
	 * @var bool|null $transferable
	 */
	public ?bool $transferable;

	/**
	 * Possible values: [refundable, non_refundable, partially_refundable]
	 *
	 * Parameter indicating whether the ticket is refundable, partially refundable, or not refundable.
	 *
	 * @var string|null $refundability
	 */
	public ?string $refundability;

}

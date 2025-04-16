<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Details about the shipping related to the order, including address, contact information, and individual shipments.
 */
class Shipping extends DataTransferObject
{
	/**
	 * Details of a physical address.
	 *
	 * @var Address|null $address
	 */
	public ?Address $address;

}

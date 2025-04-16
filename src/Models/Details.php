<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Location details object
 */
class Details extends DataTransferObject
{
	/**
	 * Domain address of the location. Required for online locations.
	 * caution
	 *
	 * The domain parameter's value must be unique across all locations.
	 *
	 * @var string
	 */
	public string $domain;
}

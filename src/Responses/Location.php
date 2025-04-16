<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Location where merchants sells products.
 */
class Location extends DataTransferObject
{

	/**
	 * Unique ID of the location object.
	 *
	 * @var string|null
	 */
	public ?string $id;

	/**
	 * Name of the location.
	 * caution
	 *
	 * The name parameter's value must be unique across all locations.
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Possible values: [online]
	 *
	 * Type of the location.
	 * note
	 *
	 * Currently only online locations are supported.
	 *
	 * @var string $type
	 */
	public string $type = 'online';

	/**
	 * @var Details $details
	 */
	public Details $details;
}

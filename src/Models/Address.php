<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * The address of the event location.
 */
class Address extends DataTransferObject
{
	/**
	 * Possible length: <= 100 characters
	 *
	 * Primary address line.
	 *
	 * @var string|null $street_line_1
	 */
	public ?string $street_line_1;

	/**
	 * Possible length: <= 100 characters
	 *
	 * Secondary address line, such as floor and apartment number.
	 *
	 * @var string|null $street_line_2
	 */
	public ?string $street_line_2;

	/**
	 * Possible length: <= 100 characters
	 *
	 * State or province of the address.
	 *
	 * @var string|null $region
	 */
	public ?string $region;

	/**
	 * Possible length: <= 100 characters
	 *
	 * City of the address.
	 *
	 * @var string|null $city
	 */
	public ?string $city;

	/**
	 * Possible length: >= 2 characters and <= 2 characters
	 * Pattern: Value must match regular expression ^[A-Z]{2}$
	 *
	 * ISO 2-letter country code.
	 *
	 * @var string|null $country_code
	 */
	public ?string $country_code;

	/**
	 * Possible length: <= 100 characters
	 *
	 * Postal code of the address.
	 *
	 * @var string|null $postcode
	 */
	public ?string $postcode;

}

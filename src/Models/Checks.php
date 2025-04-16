<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class Checks extends DataTransferObject
{
	/**
	 * @var ThreeDS|null
	 */
	public ?ThreeDS $three_ds;

	/**
	 * Possible values: [match, not_match, incorrect, not_processed]
	 *
	 * The result of CVV verification.
	 * Parameter value    Description
	 * match    CVV matches the card's CVV
	 * not_match    CVV does not match the card's CVV
	 * incorrect    CVV format is incorrect for this type of card
	 * not_processed    CVV verification was not performed
	 *
	 * @var string|null $cvv_verification
	 */
	public ?string  $cvv_verification;
	/**
	 * Possible values: [match, not_match, n_a, invalid]
	 *
	 * The result of address verification.
	 *
	 * @var string|null $address
	 */
	public ?string $address;

	/**
	 * Possible values: [match, not_match, n_a, invalid]
	 *
	 * The result of postcode verification.
	 *
	 * @var string|null $postcode
	 */
	public ?string $postcode;

	/**
	 * Possible values: [match, not_match, n_a, invalid]
	 *
	 * The result of cardholder verification.
	 *
	 * @var string|null
	 */
	public ?string $cardholder;

}

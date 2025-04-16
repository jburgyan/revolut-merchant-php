<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class ThreeDS extends DataTransferObject
{
	/**
	 * The Electronic Commerce Indicator (ECI) value corresponds to the authentication result and indicates the level of security used when the payment information was provided.
	 *
	 * @var string|null $eci
	 */
	public ?string $eci;

	/**
	 * Possible values: [verified, failed, challenge]
	 *
	 * The result of 3D Secure check.
	 *
	 * @var string|null $state
	 */
	public ?string $state;

	/**
	 * The 3D Secure version.
	 *
	 * @var int|null $version
	 */
	public ?int $version;
}

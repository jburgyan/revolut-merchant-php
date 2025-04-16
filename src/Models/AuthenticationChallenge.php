<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Details about the authentication challenge that should be performed to complete the authentication process.
 * For more information about Revolut's 3DS solution, see: 3D Secure overview.
 *
 * Only returned if the payment's state is authentication_challenge.
 */
class AuthenticationChallenge extends DataTransferObject
{

	/**
	 * Possible values: [three_ds, three_ds_fingerprint]
	 *
	 * Type of the authentication challenge the payment triggers.
	 *
	 * @var string $type
	 */
	public string $type;
}

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
class AuthenticationChallengeThreeDs extends AuthenticationChallenge
{

	/**
	 * The URL of the authentication challenge.
	 *
	 * @var string $acs_url
	 */
	public string $acs_url;
}

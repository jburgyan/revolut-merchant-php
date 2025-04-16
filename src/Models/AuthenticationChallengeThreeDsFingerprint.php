<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

/**
 * Details about the authentication challenge that should be performed to complete the authentication process.
 * For more information about Revolut's 3DS solution, see: 3D Secure overview.
 *
 * Only returned if the payment's state is authentication_challenge.
 */
class AuthenticationChallengeThreeDsFingerprint extends AuthenticationChallenge
{

	/**
	 * The URL of the fingerprint. (Used only internally by Revolut.)
	 *
	 * @var string $fingerprint_url
	 */
	public string $fingerprint_url;

	/**
	 * Data about the fingerprint used for authentication. (Used only internally by Revolut.)
	 *
	 * @var string $fingerprint_data
	 */
	public string $fingerprint_data;
}

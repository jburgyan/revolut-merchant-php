<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * The details of a payment that have been made towards an order (successful or unsuccessful).
 */
class Payment extends DataTransferObject
{
	/**
	 * The ID of the payment.
	 *
	 * @var string $id
	 */
	public string $id;

	/**
	 * Possible values: [pending, authentication_challenge, authentication_verified, authorisation_started, authorisation_passed, authorised, capture_started, captured, refund_validated, refund_started, cancellation_started, declining, completing, cancelling, failing, completed, declined, soft_declined, cancelled, failed]
	 *
	 * The status of the payment.
	 *
	 * @var string $state
	 */
	public string $state;

	/**
	 * Possible values: [3ds_challenge_abandoned, 3ds_challenge_failed_manually, cardholder_name_missing, customer_challenge_abandoned, customer_challenge_failed, customer_name_mismatch, do_not_honour, expired_card, high_risk, insufficient_funds, invalid_address, invalid_amount, invalid_card, invalid_country, invalid_cvv, invalid_email, invalid_expiry, invalid_merchant, invalid_phone, invalid_pin, issuer_not_available, pick_up_card, rejected_by_customer, restricted_card, suspected_fraud, technical_error, transaction_not_allowed_for_cardholder, unknown_card, withdrawal_limit_exceeded]
	 *
	 * The reason for a failed or declined payment.
	 *
	 * A failed or declined payment can result from multiple reasons. To learn more, check our failure reasons.
	 *
	 * @var string|null $decline_reason
	 */
	public ?string $decline_reason;

	/**
	 * The reason for a failed or declined payment, sent by the financial institution processing the payment.
	 *
	 * @var string|null $bank_message
	 */
	public ?string $bank_message;

	/**
	 * The date and time the payment was created.
	 *
	 * @var string $created_at
	 */
	public string $created_at;

	/**
	 * The date and time the payment was last updated.
	 *
	 * @var string $updated_at
	 */
	public string $updated_at;

	/**
	 * Temporary token of the payment used to fetch the reward offer during checkout and link user registrations to the given offers.
	 *
	 * The token is only valid for a limited time.
	 *
	 * @var string|null $token
	 */
	public ?string $token;

	/**
	 * The order total expressed in minor currency units, according to the ISO 4217 standard. For example,
	 * 7034 in EUR corresponds to €70.34.
	 * info
	 *
	 * Conversion between major and minor units varies by currency. For instance, 100 minor units equal £1.00 in GBP,
	 * whereas in ISK they represent 100 units. For more details, see the ISO 4217 standard.
	 *
	 * @var int $amount
	 */
	public int $amount;

	/**
	 * ISO 4217 currency code in upper case.
	 * info
	 *
	 * For more information about the supported currencies, see: Help Center.
	 *
	 * @var string|null
	 */
	public ?string $currency;

	/**
	 * The amount of the settled payment (minor currency unit). For example, 7034 stands for €70.34.
	 *
	 * @var int|null $settled_amount
	 */
	public ?int $settled_amount;

	/**
	 * The currency of the settled payment. ISO 4217 currency code in upper case.
	 * info
	 *
	 * For more information about the supported currencies, see: Help Center.
	 *
	 * @var int|null $settled_currency
	 */
	public ?int $settled_currency;

	/**
	 * The details of the payment method used to make the payment.
	 *
	 * @var ApplePay|Card|GooglePay|RevolutPayAccount|RevolutPayCard|null
	 */
	public ApplePay|RevolutPayAccount|Card|GooglePay|RevolutPayCard|null $payment_method;

	/**
	 * @var AuthenticationChallengeThreeDs|AuthenticationChallengeThreeDsFingerprint|null
	 */
	public AuthenticationChallengeThreeDs|AuthenticationChallengeThreeDsFingerprint|null $authentication_challenge;

	/**
	 * @var Address|null
	 */
	public ?Address $billing_address;

	/**
	 * Possible values: [low, high]
	 *
	 * The risk level of the card.
	 *
	 * If the risk level is high, the payment might be declined.
	 *
	 * @var string|null
	 */
	public ?string $risk_level;

	/**
	 * The details of the order fee.
	 *
	 * @var Fee[]|null
	 */
	public ?array $fees;

}

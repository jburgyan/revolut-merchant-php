<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * the details of a specific webhook.
 */
class Webhook extends DataTransferObject
{
	/**
	 * @var string $id
	 */
	public string $id;

	/**
	 * @var string|null $url
	 */
	public ?string $url;

    /**
     * Possible values: [ORDER_COMPLETED, ORDER_AUTHORISED, ORDER_CANCELLED, ORDER_PAYMENT_AUTHENTICATED, ORDER_PAYMENT_DECLINED, ORDER_PAYMENT_FAILED, PAYOUT_INITIATED, PAYOUT_COMPLETED, PAYOUT_FAILED]
     * Possible number of items: non-empty
     *
     * List of event types that the webhook is configured to listen to.
     *
     * Each event is related to status changes of a specific object in the Merchant API:
     * Object    Event types
     * Order
     *
     * ORDER_COMPLETED
     * ORDER_AUTHORISED
     * ORDER_CANCELLED
     *
     * Payment
     *
     * ORDER_PAYMENT_AUTHENTICATED
     * ORDER_PAYMENT_DECLINED
     * ORDER_PAYMENT_FAILED
     *
     * Payout
     *
     * PAYOUT_INITIATED
     * PAYOUT_COMPLETED
     * PAYOUT_FAILED
     *
     * @var string[] $events
     */
    public array $events;

	/**
	 * The signing secret for the webhook. Use it to verify the signature for the webhook request's payload.
	 *
	 * @var string|null $signing_secret
	 */
	public ?string $signing_secret;
}

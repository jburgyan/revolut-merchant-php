<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Object containing information about upcoming payments associated with the order.
 */
class UpcomingPaymentData extends DataTransferObject
{
	/**
	 * The date and time in ISO 8601 format when the upcoming payment is scheduled to be executed.
	 *
	 * @var string $date
	 */
	public string $date;

	/**
	 * The unique ID of the customer's payment method used to complete the scheduled payment.
	 *
	 * @var string $payment_method_id
	 */
	public string $payment_method_id;

}

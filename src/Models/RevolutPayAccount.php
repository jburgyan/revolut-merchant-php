<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

/**
 * The customer paid the order via Revolut Pay using their Revolut account.
 */
class RevolutPayAccount extends PaymentMethod
{
	/**
	 * The ID of the payment method.
	 *
	 * @var int|null
	 */
	public ?int $id;

	/**
	 * The type of payment method used to pay for the order.
	 *
	 * @var string
	 */
	public string $type = 'revolut_pay_account';


}

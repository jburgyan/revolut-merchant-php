<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Object containing information about a customer.
 *
 * If you have it, we strongly advise providing at least either id, phone, or email.
 *
 * Using the Customers operations, you can manage customer instances.
 *
 * The following behaviours apply to different use cases:
 * Existing customer    If id was provided, we ignore other customer details and associate the customer with the order.
 *
 * If either email, phone, or full_name was provided (without an existing customer's id), we always create a new customer, irrespective of another, existing customer object having the same details.
 *
 * New customer    If either email, phone, or full_name was provided, we create a new customer, irrespective of another customer object having the same details.
 *
 * If id of a non-existent customer was provided, we return a 404 error, irrespective of other details provided.
 */
class Customer extends DataTransferObject
{
	/**
	 * Permanent ID of a customer used to retrieve, update, delete a customer. This ID can also be used to link customer to an order.
	 * note
	 *
	 * If you provide the customer's ID during order creation, no other customer data is required,
	 * they will be parsed automatically from the referenced customer object.
	 *
	 * @var string|null
	 */
	public ?string $id;

	/**
	 * @var string|null
	 */
	public ?string $created_at;

	/**
	 * @var string|null
	 */
	public ?string $updated_at;

	/**
	 * The customer's email address.
	 * note
	 *
	 * If you wish to save a customer's payment method using any of the available payment methods on the Revolut Checkout Widget (Revolut Pay, Card payments), you need to meet one of the following requirements:
	 *
	 * Have a customer object with email and assign it to the order by providing customer.id
	 * Create a new customer with customer.email during order creation
	 * Pass the email in the configuration of the Revolut Checkout Widget
	 *
	 * For more information, see: Charge a customer's saved payment method.
	 *
	 * @var string|null
	 */
	public ?string $email;

	/**
	 * Possible length: >= 2 characters
	 *
	 * The customer's full name.
	 *
	 * @var string|null
	 */
	public ?string $full_name;
	/**
	 * @var string|null
	 */
	public ?string $business_name;

	/**
	 * The customer's phone number.
	 *
	 * @var string|null
	 */
	public ?string $phone;

	/**
	 * The birth date of the customer.
	 *
	 * @var string|null
	 */
	public ?string $date_of_birth;

    /**
     * @var CustomerPaymentMethod[]|null
     */
    public ?array $payment_methods;
}

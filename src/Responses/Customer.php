<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Customer extends DataTransferObject
{
    public string  $id;
    public string  $created_at;
    public string  $updated_at;
    public string  $email;
    public ?string $full_name;
    public ?string $business_name;
    public ?string $phone;
    /**
     * @var CustomerPaymentMethod[]|null
     */
    public ?array $payment_methods;
}

<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class CustomerCreate extends DataTransferObject
{
    public ?string $full_name;
    public ?string $business_name;
    public string  $email;
    public ?string $phone;
}

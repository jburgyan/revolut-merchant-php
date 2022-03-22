<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class CustomerUpdate extends DataTransferObject
{
    public ?string $full_name;
    public ?string $business_name;
    public ?string $email;
    public ?string $phone;
}

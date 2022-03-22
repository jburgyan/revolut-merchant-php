<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class OrderConfirm extends DataTransferObject
{
    public ?string $payment_method_id;
}

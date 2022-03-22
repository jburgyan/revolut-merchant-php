<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class OrderRefund extends DataTransferObject
{
    public int     $amount;
    public ?string $description;

}

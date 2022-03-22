<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class OrderCapture extends DataTransferObject
{
    public int $amount;
}

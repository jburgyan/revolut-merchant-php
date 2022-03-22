<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Fee extends DataTransferObject
{
    public string $type;
    public Amount $amount;
}

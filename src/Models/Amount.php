<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

class Amount extends DataTransferObject
{
    public int    $value;
    public string $currency;
}

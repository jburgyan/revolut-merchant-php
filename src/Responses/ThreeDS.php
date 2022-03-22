<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class ThreeDS extends DataTransferObject
{
    public string $state;
    public int    $version;
}

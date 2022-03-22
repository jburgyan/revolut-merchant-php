<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class PaymentMethodUpdate extends DataTransferObject
{
    public string $saved_for;
}

<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class CustomerPaymentMethod extends DataTransferObject
{
    public int           $id;
    public string        $type;
    public string        $saved_for;
    public MethodDetails $method_details;
}

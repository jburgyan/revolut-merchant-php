<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Models;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * The details of related orders. You can use the ID of the related order to Retrieve the order information.
 */
class OrderRelated extends DataTransferObject
{
    public string $id;
    public string $type;
    public string $state;
    public Amount $amount;
}

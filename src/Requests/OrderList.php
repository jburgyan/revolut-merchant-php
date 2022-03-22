<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class OrderList extends DataTransferObject
{
    public ?int    $limit;
    public ?string $created_before;
    public ?string $from_created_date;
    public ?string $to_created_date;
    public ?string $email;
    public ?string $merchant_order_ext_ref;
}

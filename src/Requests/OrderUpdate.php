<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class OrderUpdate extends DataTransferObject
{
    public ?int    $amount;
    public ?string $currency;
    public ?string $capture_mode;
    public ?string $merchant_order_ext_ref;
    public ?string $email;
    public ?string $description;
    public ?string $settlement_currency;
    public ?string $customer_id;
    //$shipping_address
}

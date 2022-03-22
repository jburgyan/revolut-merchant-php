<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Order extends DataTransferObject
{
    public string   $id;
    public string   $type;
    public string   $state;
    public string   $created_at;
    public string   $updated_at;
    public Amount   $order_amount;
    public ?string  $public_id;
    public ?string  $completed_at;
    public ?string  $description;
    public ?string  $capture_mode;
    public ?string  $settlement_currency;
    public ?string  $merchant_order_ext_ref;
    public ?string  $customer_id;
    public ?string  $email;
    public ?string  $phone;
    public ?Amount  $order_outstanding_amount;
    public ?Amount  $refunded_amount;
    public ?Address $shipping_address;
    /**
     * @var Payment[]|null
     */
    public ?array $payments;
    /**
     * @var OrderRelated[]|null
     */
    public ?array $related;

}

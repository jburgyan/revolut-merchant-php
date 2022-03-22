<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Payment extends DataTransferObject
{
    public string         $id;
    public string         $state;
    public string         $created_at;
    public string         $updated_at;
    public ?Amount        $amount;//Может не быть при возврате заказа
    public ?string        $failure_reason;
    public ?Amount        $settled_amount;
    public ?PaymentMethod $payment_method;
    //shipping_address
    public ?string $risk_level;
    /**
     * @var Fee[]|null
     */
    public ?array $fees;

    public ?string $completed_at;
    public ?Amount $authorised_amount;
}

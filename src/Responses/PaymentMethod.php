<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;


use Spatie\DataTransferObject\DataTransferObject;

class PaymentMethod extends DataTransferObject
{
    public ?int   $id;
    public string $type;
    public Card   $card;
}

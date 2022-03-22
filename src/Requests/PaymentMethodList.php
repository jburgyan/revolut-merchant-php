<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class PaymentMethodList extends DataTransferObject
{
    public ?bool $only_merchant;
}

<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Checks extends DataTransferObject
{
    public ?ThreeDS $three_ds;
    public ?string  $cvv_verification;
    public ?string  $address;
    public ?string  $postcode;
    public ?string  $cardholder;

}

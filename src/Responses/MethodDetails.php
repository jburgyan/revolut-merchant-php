<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class MethodDetails extends DataTransferObject
{
    public string  $bin;
    public string  $last4;
    public int     $expiry_month;
    public int     $expiry_year;
    public string  $cardholder_name;
    public Address $billing_address;


}

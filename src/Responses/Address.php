<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Address extends DataTransferObject
{
    public string $country_code;
    public string $postcode;
    public string $street_line_1;
    public string $street_line_2;
    public string $region;
    public string $city;
}

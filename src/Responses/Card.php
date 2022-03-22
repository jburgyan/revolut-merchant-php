<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Card extends DataTransferObject
{
    public string $card_brand;
    public string $funding;
    public string $card_country;
    public string $card_bin;
    public string $card_last_four;
    public string $card_expiry;
    public string $cardholder_name;
    public Checks $checks;
}

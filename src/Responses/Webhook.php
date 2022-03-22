<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Webhook extends DataTransferObject
{
    public string  $id;
    public ?string $url;
    /**
     * @var string[]
     */
    public array $events;
}

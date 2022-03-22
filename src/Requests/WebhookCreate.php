<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class WebhookCreate extends DataTransferObject
{
    public string $url;
    /**
     * @var string[]
     */
    public array $events;
}

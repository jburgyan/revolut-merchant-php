<?php

declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Requests;

use Spatie\DataTransferObject\DataTransferObject;

class WebhookUpdate extends DataTransferObject
{
    public ?string $url;
    /**
     * @var string[]|null
     */
    public ?array $events;
}

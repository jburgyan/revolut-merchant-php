<?php declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Resources;


use Flowwow\RevolutMerchant\Client;

abstract class Resource
{
    /**
     * the Revolut merchant client
     */
    protected Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
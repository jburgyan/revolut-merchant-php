<?php declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Resources;


use Flowwow\RevolutMerchant\Exceptions\MerchantException;
use Flowwow\RevolutMerchant\Requests\WebhookCreate;
use Flowwow\RevolutMerchant\Requests\WebhookUpdate;
use Flowwow\RevolutMerchant\Responses\Customer;
use Flowwow\RevolutMerchant\Responses\Webhook;

class WebhookResource extends Resource
{
    /**
     * The Revolut merchant payment webhooks endpoint
     */
    protected const ENDPOINT = '/webhooks';

    /**
     * get all Webhooks
     *
     * @return Customer[]
     * @throws MerchantException
     */
    public function list(): array
    {
        $response = $this->client->get(self::ENDPOINT);
        $data     = [];
        foreach ($response as $order) {
            $data[] = new Webhook($order);
        }

        return $data;
    }

    /**
     * Create a new webhook for events
     * @param WebhookCreate $json
     * @return Webhook
     * @throws MerchantException
     */
    public function create(WebhookCreate $json): Webhook
    {
        $response = $this->client->post(self::ENDPOINT, ['json' => $json]);

        return new Webhook($response);
    }

    /**
     *
     * Retrieve a webhook by its ID
     *
     * @param string $id The payment order ID
     * @return Webhook The response body
     * @throws MerchantException
     */
    public function get(string $id): Webhook
    {
        $response = $this->client->get(self::ENDPOINT . '/' . $id);

        return new Webhook($response);
    }

    /**
     * Update webhook
     *
     * @param string $id
     * @param WebhookUpdate $json
     * @return Webhook
     * @throws MerchantException
     */
    public function update(string $id, WebhookUpdate $json): Webhook
    {
        $response = $this->client->patch(self::ENDPOINT . '/' . $id, ['json' => $json->toArray()]);

        return new Webhook($response);
    }

    /**
     * Delete webhook
     *
     * @param string $id
     * @return array
     * @throws MerchantException
     */
    public function delete(string $id): array
    {
        return $this->client->delete(self::ENDPOINT . '/' . $id);
    }

}
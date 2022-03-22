<?php declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Resources;


use Flowwow\RevolutMerchant\Exceptions\MerchantException;
use Flowwow\RevolutMerchant\Requests\OrderCapture;
use Flowwow\RevolutMerchant\Requests\OrderConfirm;
use Flowwow\RevolutMerchant\Requests\OrderCreate;
use Flowwow\RevolutMerchant\Requests\OrderList;
use Flowwow\RevolutMerchant\Requests\OrderRefund;
use Flowwow\RevolutMerchant\Requests\OrderUpdate;
use Flowwow\RevolutMerchant\Responses\Order;
use Flowwow\RevolutMerchant\Responses\OrderShort;

class OrderResource extends Resource
{
    /**
     * The Revolut merchant payment orders endpoint
     */
    protected const ENDPOINT = '/orders';

    /**
     * Create a new payment order
     *
     * @param OrderCreate $json
     * @return Order
     * @throws MerchantException
     */
    public function create(OrderCreate $json): Order
    {
        $response = $this->client->post(self::ENDPOINT, ['json' => $json->toArray()]);

        return new Order($response);
    }

    /**
     *
     * Retrieve a payment order by its ID
     *
     * @param string $id The payment order ID
     * @return Order The response body
     * @throws MerchantException
     */
    public function get(string $id): Order
    {
        $response = $this->client->get(self::ENDPOINT . '/' . $id);

        return new Order($response);
    }

    /**
     *
     * Retrieve all the orders that you’ve created
     *
     * @param OrderList|null $json
     * @return OrderShort[] The response body
     * @throws MerchantException
     */
    public function list(?OrderList $json = null): array
    {
        $response = $this->client->get(self::ENDPOINT . '?' . http_build_query($json ?? []));

        $data = [];
        foreach ($response as $order) {
            $data[] = new OrderShort($order);
        }

        return $data;
    }

    /**
     * Update the details of an order.
     * @param string $id
     * @param OrderUpdate $json
     * @return Order
     * @throws MerchantException
     */
    public function update(string $id, OrderUpdate $json): Order
    {
        $response = $this->client->patch(self::ENDPOINT . '/' . $id, ['json' => $json->toArray()]);

        return new Order($response);
    }

    /**
     * Capture a authorised payment
     *
     * @param string $id The payment order ID
     * @param OrderCapture $json
     * @return Order
     * @throws MerchantException
     */
    public function capture(string $id, OrderCapture $json): Order
    {
        $response = $this->client->post(self::ENDPOINT . '/' . $id . '/capture', ['json' => $json->toArray()]);

        return new Order($response);
    }

    /**
     * Cancel a payment which has not been captured yet
     *
     * @param string $id The payment order ID
     * @return Order
     * @throws MerchantException
     */
    public function cancel(string $id): Order
    {
        $response = $this->client->post(self::ENDPOINT . '/' . $id . '/cancel');

        return new Order($response);
    }

    /**
     * Create a full or partial refund
     *
     * @param string $id The payment order ID
     * @param OrderRefund $json
     * @return Order
     * @throws MerchantException
     */
    public function refund(string $id, OrderRefund $json): Order
    {
        $response = $this->client->post(self::ENDPOINT . '/' . $id . '/refund', ['json' => $json->toArray()]);

        return new Order($response);
    }

    /**
     * Attempt to authorize and authenticate a payment.
     * @param string $id
     * @param OrderConfirm $json
     * @return Order
     * @throws MerchantException
     */
    public function confirm(string $id, OrderConfirm $json): Order
    {
        $response = $this->client->post(self::ENDPOINT . '/' . $id . '/confirm', ['json' => $json->toArray()]);

        return new Order($response);
    }
}
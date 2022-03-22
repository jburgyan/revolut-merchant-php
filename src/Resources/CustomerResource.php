<?php declare(strict_types=1);

namespace Flowwow\RevolutMerchant\Resources;

use Flowwow\RevolutMerchant\Exceptions\MerchantException;
use Flowwow\RevolutMerchant\Requests\CustomerCreate;
use Flowwow\RevolutMerchant\Requests\CustomerUpdate;
use Flowwow\RevolutMerchant\Requests\PaymentMethodList;
use Flowwow\RevolutMerchant\Requests\PaymentMethodUpdate;
use Flowwow\RevolutMerchant\Responses\Customer;
use Flowwow\RevolutMerchant\Responses\MethodDetails;

class CustomerResource extends Resource
{
    /**
     * The Revolut merchant payment orders endpoint
     */
    protected const ENDPOINT = '/customers';

    /**
     * Create a new customer
     *
     * @param CustomerCreate $json
     * @return Customer
     * @throws MerchantException
     */
    public function create(CustomerCreate $json): Customer
    {
        $response = $this->client->post(self::ENDPOINT, ['json' => $json]);

        return new Customer($response);
    }

    /**
     * get all Customers
     *
     * @return Customer[]
     * @throws MerchantException
     */
    public function list(): array
    {
        $response = $this->client->get(self::ENDPOINT);
        $data     = [];
        foreach ($response as $order) {
            $data[] = new Customer($order);
        }

        return $data;
    }

    /**
     *
     * Retrieve a payment order by its ID
     *
     * @param string $id The payment order ID
     * @return Customer The response body
     * @throws MerchantException
     */
    public function get(string $id): Customer
    {
        $response = $this->client->get(self::ENDPOINT . '/' . $id);

        return new Customer($response);
    }

    /**
     * Update customer
     *
     * @param string $id
     * @param CustomerUpdate $json
     * @return Customer
     * @throws MerchantException
     */
    public function update(string $id, CustomerUpdate $json): Customer
    {
        $response = $this->client->patch(self::ENDPOINT . '/' . $id, ['json' => $json->toArray()]);

        return new Customer($response);
    }

    /**
     * Delete customer
     *
     * @param string $id
     * @return array
     * @throws MerchantException
     */
    public function delete(string $id): array
    {
        return $this->client->delete(self::ENDPOINT . '/' . $id);
    }

    /**
     * Get all customer's payment method
     *
     * @param string $id
     * @param PaymentMethodList $json
     * @return MethodDetails[]
     * @throws MerchantException
     */
    public function getListPaymentMethod(string $id, PaymentMethodList $json): array
    {
        $response = $this->client->get(self::ENDPOINT . '/' . $id . '/payment-methods', ['json' => $json->toArray()]);
        $data     = [];
        foreach ($response as $order) {
            $data[] = new MethodDetails($order);
        }

        return $data;
    }

    /**
     * Get customer's payment method
     * @param string $id
     * @param string $methodId
     * @return MethodDetails
     * @throws MerchantException
     */
    public function getPaymentMethod(string $id, string $methodId): MethodDetails
    {
        $response = $this->client->get(self::ENDPOINT . '/' . $id . '/payment-methods/' . $methodId);

        return new MethodDetails($response);
    }

    /**
     * Update customer's payment method
     *
     * @param string $id
     * @param string $methodId
     * @param PaymentMethodUpdate $json
     * @return MethodDetails
     * @throws MerchantException
     */
    public function updatePaymentMethod(string $id, string $methodId, PaymentMethodUpdate $json): MethodDetails
    {
        $response =
            $this->client->patch(self::ENDPOINT . '/' . $id . '/payment-methods/' . $methodId, ['json' => $json]);

        return new MethodDetails($response);
    }

    /**
     * Delete customer's payment method
     *
     * @param string $id
     * @param string $methodId
     * @return array
     * @throws MerchantException
     */
    public function deletePaymentMethod(string $id, string $methodId): array
    {
        return $this->client->delete(self::ENDPOINT . '/' . $id . '/payment-methods/' . $methodId);
    }


}
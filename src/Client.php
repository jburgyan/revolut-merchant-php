<?php declare(strict_types=1);


namespace Flowwow\RevolutMerchant;

use Flowwow\RevolutMerchant\Exceptions\MerchantException;
use Flowwow\RevolutMerchant\Resources\CustomerResource;
use Flowwow\RevolutMerchant\Resources\OrderResource;
use Flowwow\RevolutMerchant\Resources\WebhookResource;
use GuzzleHttp\Exception\GuzzleException;


class Client
{
    /** The Revolut merchant Sandbox URL */
    public const SANDBOX_URL = 'https://sandbox-merchant.revolut.com';

    /** The Revolut merchant production URL */
    public const PRODUCTION_URL = 'https://merchant.revolut.com';

    /** The Revolut merchant API endpoint */
    protected const API_ENDPOINT = '/api';

    /** The Revolut merchant API version */
    protected const API_VERSION = '1.0';

    /** The API key */
    private string $apiKey;

	/** The API version */
	private string $apiVersion;

    private \GuzzleHttp\Client $httpClient;

    /**
     * Whether or not to use the sandbox environment
     */
    private bool $sandbox;
    /** Resources */
    public CustomerResource $customer;
    public OrderResource    $order;
    public WebhookResource  $webhook;


    /**
     * Create a new client
     *
     * @param string $apiKey
     * @param bool $sandbox
     * @return void
     */
    public function __construct(string $apiKey, bool $sandbox = false, $apiVersion = '2024-09-01')
    {
        $this->apiKey     = $apiKey;
	    $this->apiVersion = $apiVersion;
        $this->sandbox    = $sandbox;
        $this->httpClient = new \GuzzleHttp\Client();
        $this->order      = new OrderResource($this);
        $this->customer   = new CustomerResource($this);
        $this->webhook    = new WebhookResource($this);
    }

    /**
     * Perform a 'POST' request
     *
     * @param string $endpoint The request endpoint
     * @param array $options The request options
     * @return array The response body
     * @throws MerchantException
     */
    public function post(string $endpoint, array $options = []): array
    {
        return $this->request('POST', $endpoint, $options);
    }

    /**
     * Perform a 'GET' request
     *
     * @param string $endpoint The request endpoint
     * @param array $options The request options
     * @return array The response body
     * @throws MerchantException
     */
    public function get(string $endpoint, array $options = []): array
    {
        return $this->request('GET', $endpoint, $options);
    }

    /**
     * Perform a 'PATCH' request
     *
     * @param string $endpoint The request endpoint
     * @param array $options The request options
     * @return array The response body
     * @throws MerchantException
     */
    public function patch(string $endpoint, array $options = []): array
    {
        return $this->request('PATCH', $endpoint, $options);
    }

    /**
     * Perform a 'DELETE' request
     *
     * @param string $endpoint The request endpoint
     * @param array $options The request options
     * @return array The response body
     * @throws MerchantException
     */
    public function delete(string $endpoint, array $options = []): array
    {
        return $this->request('DELETE', $endpoint, $options);
    }

    /**
     * Perform a request
     *
     * @param string $method The request method
     * @param string $endpoint The request endpoint
     * @param array $options The request options
     * @return array The response body
     * @throws MerchantException
     */
    private function request(string $method, string $endpoint, array $options): array
    {
        try {
            $response =
                $this->httpClient->request($method, $this->baseUri() . $endpoint, $this->buildOptions($options));
        } catch (GuzzleException $e) {
            throw new MerchantException($e->getMessage(), $e->getCode(), $e);
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Build the base URI for all API requests
     * @return string
     */
    public function baseUri(): string
    {
        $url = $this->sandbox ? self::SANDBOX_URL : self::PRODUCTION_URL;

        return $url . $this->apiUri();
    }

    /**
     * Build the API URI
     *
     * @return string
     */
    private function apiUri(): string
    {
        return self::API_ENDPOINT . '/' . self::API_VERSION;
    }

    /**
     * Build the request options
     *
     * @param array $options
     * @return array
     */
    private function buildOptions(array $options = []): array
    {
        return array_merge($options, [
	        'headers' => [
		        'Authorization' => 'Bearer ' . $this->apiKey,
		        'Revolut-Api-Version' => $this->apiVersion
	        ],
        ]);
    }

    /**
     * @return CustomerResource
     */
    public function getCustomer(): CustomerResource
    {
        return $this->customer;
    }

    /**
     * @return OrderResource
     */
    public function getOrder(): OrderResource
    {
        return $this->order;
    }

    /**
     * @return WebhookResource
     */
    public function getWebhook(): WebhookResource
    {
        return $this->webhook;
    }

}

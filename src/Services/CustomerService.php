<?php

namespace App\Services;

use Generator;
use GuzzleHttp\Client;
use  Psr\Http\Message\ResponseInterface;

class CustomerService
{
    private string $url = 'https://randomuser.me/api/';

    public function __construct(private readonly Client $client) {}

    /**
     * @return ResponseInterface
     */
    protected function getCustomerResponse(): ResponseInterface
    {
        $response = $this->client->request('GET', $this->url, ['timeout' => 10]);
        
        return $response;
    }

    /**
     * @param int $size
     * 
     * @return Generator
     */
    public function getCustomers(int $size) : Generator {
        for ($i = 1; $i <= $size; $i++) {
            yield $this->getNextCustomer();
        }
    }

    /**
     * @return CustomerEntity|null
     */
    public function getNextCustomer(): ?CustomerEntity
    {
        if ($this->getCustomerResponse()->getStatusCode() === 200) {
            $content = $this->getCustomerResponse()->getBody()->getContents();
            $content = json_decode($content, true);
            return new CustomerEntity($content['results'][0]);
        }
        
        return null;
    }
}

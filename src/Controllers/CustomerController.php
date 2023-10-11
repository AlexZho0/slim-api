<?php

namespace App\Controllers;

use App\Helpers\Comparator;
use App\Services\CustomerService;
use App\Services\XmlRender;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use GuzzleHttp\Client;

class CustomerController
{
    private XmlRender $xml;
    private CustomerService $customerService;

    public function __construct()
    {
        $this->xml = new XmlRender();
        $this->customerService = new CustomerService(new Client());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return Response
     */
    public function getAllCustomers(Request $request, Response $response, $args): Response
    {
        $customers = [];
        foreach ($this->customerService->getCustomers(2) as $item) {
            $customers[] = $item->toArray();
        }
        usort($customers, new Comparator('last_name', 'desc'));

        $this->xml->setStatus(200);
        $this->xml->setBody(['customers'=> [
            'customer' => $customers
        ]]);
        $response->getBody()->write($this->xml->render());

        return $response->withHeader('Content-Type', 'text/xml; charset=UTF-8');
    }
}

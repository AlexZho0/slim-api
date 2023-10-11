<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return ResponseInterface
     */
    public function getHome(Request $request, Response $response, $args): Response
    {
        $response->getBody()->write("Hello, Dear Visitor!");

        return $response;
    }
}

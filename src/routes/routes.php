<?php

use Slim\App;
use App\Controllers\HomeController;
use App\Controllers\CustomerController;

return function (App $app) {
    $app->get('/', HomeController::class . ':getHome');

    $app->group('/v1/customers', function ($app) {
        $app->get('', CustomerController::class . ':getAllCustomers');
    });
};

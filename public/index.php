<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..');
$dotenv->load();

$app = Slim\Factory\AppFactory::create();

$app->addRoutingMiddleware();
if ($_ENV['APP_ENV'] === 'local') {
    $app->addErrorMiddleware(true, true, true);
} else $app->addErrorMiddleware(false, true, true);


$routes = require __DIR__ . '/../src/routes/routes.php';
$routes($app);

$app->run();

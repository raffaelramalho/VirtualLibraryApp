<?php

require __DIR__ . "/vendor/autoload.php";

$container = require __DIR__."/src/container.php";
$router = require __DIR__."/src/router.php";

$request = $container->get("Laminas\Diactoros\Response");
$emitter = $container->get("Laminas\HttpHandlerRunner\Emitter\SapiEmitter");

$response = $router->dispatch(
    $container->get('Laminas\Diactoros\ServerRequest'),
    $container->get('Laminas\Diactoros\Response')
);

$emitter->emit($response);




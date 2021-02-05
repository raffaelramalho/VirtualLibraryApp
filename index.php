<?php
require __DIR__ . "/vendor/autoload.php";

use League\Route\Router;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);
$router = new Router();
$emitter = new SapiEmitter();

$router->get("/", "Src\Controller\UserController::home");

$response = $router->dispatch($request);
$emitter->emit($response);
json_decode(file_get_contents($urlFull = ""));

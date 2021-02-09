<?php
require __DIR__ . "/vendor/autoload.php";

use League\Route\Router;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

$uri = '/LibraryApp';
$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], (strlen($uri)));

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);
$router = new Router();
$emitter = new SapiEmitter();

$router->get("/", "Src\Controller\UserController::home");
$router->get("/login", "Src\Controller\UserController::login");
$router->get("/register", "Src\Controller\UserController::register");

$response = $router->dispatch($request);
$emitter->emit($response);


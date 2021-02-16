<?php

$container = require __DIR__."/container.php";

$router = $container->get("League\Route\Router");
$strategy = $container->get("Src\Strategy\CustomStrategy");

$strategy->setContainer($container);

$router->group('/', function ($router) use ($container) {
    $router->get("/", "Src\Controller\UserController::home");
    $router->get("/login", "Src\Controller\UserController::login");
    $router->post("/login", "Src\Controller\UserController::loginPost")
           ->middleware($container->get("Src\Middleware\LoginPostMiddleware"));
    $router->get("/register", "Src\Controller\UserController::register");
    $router->post("/register", "Src\Controller\UserController::registerPost")
           ->middleware($container->get("Src\Middleware\RegisterPostMiddleware"));
})->setStrategy($strategy);
$router->group('/OOPS', function ($router){
    $router->get("/{num:number}", "Src\Controller\OOPSController::index");
});

return $router;

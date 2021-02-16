<?php

use League\Container\Container;

$container = new Container();

$container->addServiceProvider("Src\ServiceProvider\ModelServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\HttpMessageServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\ControllerServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\TemplateServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\MiddlewareServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\RouterServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\PDOServiceProvider");
$container->addServiceProvider("Src\ServiceProvider\StrategyServiceProvider");

return $container;
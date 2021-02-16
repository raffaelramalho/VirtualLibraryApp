<?php

namespace Src\Strategy;

use League\Route\Http\Exception\{MethodNotAllowedException, NotFoundException};
use League\Route\Strategy\StrategyInterface;
use Psr\Http\Server\MiddlewareInterface;
use League\Route\Strategy\ApplicationStrategy;

class CustomStrategy extends ApplicationStrategy implements StrategyInterface
{
    public function getMethodNotAllowedDecorator(MethodNotAllowedException $exception): MiddlewareInterface
    {
        $middleware = $this->getContainer()->get("Src\Middleware\ErrorMiddleware");
        $middleware->setError($exception);
        return $middleware;
    }

    public function getNotFoundDecorator(NotFoundException $exception): MiddlewareInterface
    {
        $middleware = $this->getContainer()->get("Src\Middleware\ErrorMiddleware");
        $middleware->setError($exception);
        return $middleware;
    }
}
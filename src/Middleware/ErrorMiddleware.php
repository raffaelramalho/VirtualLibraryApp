<?php declare(strict_types=1);

namespace Src\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;
use League\Route\Http\Exception;

class ErrorMiddleware implements MiddlewareInterface
{
    private $error;

    public function setError(Exception $error = null) 
    {
        $this->error = $error;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return new RedirectResponse(BASE_URL."/OOPS/".$this->error->getStatusCode());
    }
}
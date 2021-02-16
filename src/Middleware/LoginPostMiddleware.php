<?php declare(strict_types=1);

namespace Src\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class LoginPostMiddleware implements MiddlewareInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        $fields = $request->getParsedBody();
        
        if(!filter_var($fields['email'], FILTER_VALIDATE_EMAIL))
        {
            $response = new RedirectResponse(BASE_URL."/OOPS/400");
            return $response;
        }
        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $fields['password'])){
            $response = new RedirectResponse(BASE_URL."/OOPS/400");
            return $response;
        }
        
        return $handler->handle($request);
        
    }
}
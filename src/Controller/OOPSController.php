<?php
declare(strict_types=1);

namespace Src\Controller;

use Laminas\Diactoros\Exception\InvalidArgumentException;
use Laminas\Diactoros\Response\RedirectResponse;
use League\Plates\Engine;
use League\Route\Http\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class OOPSController{

    private $driver;
    private $response;

    public function __construct(Engine $driver, ResponseInterface $response) {
        $this->driver = $driver;
        $this->response = $response;
    }

    public function index(ServerRequestInterface $request, array $args): ResponseInterface
    {
        try{
            $cloneResponse = $this->response->withStatus($args['num']);
            $errMsg = $cloneResponse->getReasonPhrase();
            $renderedTemplate = $this->driver->render(
                'oops', ['errCode' => $args['num'],
                'errMsg' => $errMsg]
            );
            $this->response->getBody()->write($renderedTemplate);
            
            return $this->response;
            
        }catch(InvalidArgumentException $e){
            return new RedirectResponse(BASE_URL."/OOPS/404");
        }
    }
   
}

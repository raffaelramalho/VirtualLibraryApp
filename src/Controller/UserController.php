<?php 

declare(strict_types=1);

namespace Src\Controller;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function home(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $renderedTemplate = $this->view->render('userHome');
        $response->getBody()->write($renderedTemplate);
        
        return $response;
    }
}
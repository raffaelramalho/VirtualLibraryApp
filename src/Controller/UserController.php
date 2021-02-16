<?php 

declare(strict_types=1);

namespace Src\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Src\Model\UserModelInterface;

class UserController{

    private $driver;
    private $response;
    /**
     * @var UserModelInterface
     */
    private $model;

    public function __construct(
            Engine $driver, 
            ResponseInterface $response,
            UserModelInterface $model
        ) {

        $this->driver = $driver;
        $this->response = $response;
        $this->model = $model;
    }

    public function home(ServerRequestInterface $request): ResponseInterface
    {
        session_start();
        if(isset($_SESSION['user'])){
            $this->model->setUserId(intval($_SESSION['user']));
            $user = $this->model->get();
            $renderedTemplate = $this->driver->render('userHome', ['user' => $user->name]);
            $this->response->getBody()->write($renderedTemplate);
        }else{
            $renderedTemplate = $this->driver->render('userHome');
            $this->response->getBody()->write($renderedTemplate);
        }
        
        return $this->response;
    }
    public function login(ServerRequestInterface $request): ResponseInterface
    {
        $renderedTemplate = $this->driver->render('userLogin');
        $this->response->getBody()->write($renderedTemplate);

        return $this->response;
    }
    public function loginPost(ServerRequestInterface $request): ResponseInterface
    {
        try{
            session_start();
            $fields = $request->getParsedBody();

            $this->model->setEmail($fields['email']);
            $this->model->setPassword($fields['password']);
            $user = $this->model->login();
            $_SESSION['user'] = $user->user_id;

            $renderedTemplate = $this->driver->render('userLogin', ['message' => "Welcome {$user->name}"]);
            $this->response->getBody()->write($renderedTemplate);
        }catch(\Exception $e){
            $renderedTemplate = $this->driver->render('userLogin', ['error' => $e->getMessage()]);
            $this->response->getBody()->write($renderedTemplate);
        }finally{
            return $this->response;
        }
    }
    public function register(ServerRequestInterface $request): ResponseInterface
    {
        $renderedTemplate = $this->driver->render('userRegister');
        $this->response->getBody()->write($renderedTemplate);
        
        return $this->response;
    }
    public function registerPost(ServerRequestInterface $request): ResponseInterface
    {
        try{
            $fields = $request->getParsedBody();

            foreach($fields as $field => $value){
                $fields[$field] = filter_var($value, FILTER_SANITIZE_STRING);
            }

            $this->model->setName($fields['name']);
            $this->model->setEmail($fields['email']);
            $this->model->setPassword($fields['password']);
            $this->model->create();
            $renderedTemplate = $this->driver->render('userRegister', ['message' => 'your account has been successfully created']);
            $this->response->getBody()->write($renderedTemplate);
        }catch(\Exception $e){
            $renderedTemplate = $this->driver->render('userRegister', ['error' => $e->getMessage()]);
            $this->response->getBody()->write($renderedTemplate);
        }finally{
            return $this->response;
        }
    }
}

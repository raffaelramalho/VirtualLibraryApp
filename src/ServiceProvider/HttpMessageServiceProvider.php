<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Laminas\Diactoros\ServerRequestFactory;

class HttpMessageServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        'Laminas\Diactoros\Response',
        'Laminas\HttpHandlerRunner\Emitter\SapiEmitter',
        'Laminas\Diactoros\ServerRequest'
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->add('Laminas\Diactoros\Response');

        $this->getContainer()->share('Laminas\HttpHandlerRunner\Emitter\SapiEmitter');

        $this->getContainer()->share('Laminas\Diactoros\ServerRequest', function () {
            
            $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], (strlen(ROOT)));
            return ServerRequestFactory::fromGlobals();
        });
    }
}
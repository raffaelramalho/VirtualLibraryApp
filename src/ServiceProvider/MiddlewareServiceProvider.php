<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class MiddlewareServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        'Src\Middleware\RegisterPostMiddleware',
        'Src\Middleware\LoginPostMiddleware',
        'Src\Middleware\ErrorMiddleware',
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->add("Src\Middleware\RegisterPostMiddleware");
        $this->getContainer()->add("Src\Middleware\LoginPostMiddleware");
        $this->getContainer()->add("Src\Middleware\ErrorMiddleware");
    }
}
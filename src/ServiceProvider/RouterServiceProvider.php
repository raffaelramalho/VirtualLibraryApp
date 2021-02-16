<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class RouterServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        'League\Route\Strategy\ApplicationStrategy',
        'League\Route\Router'
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->add('League\Route\Strategy\ApplicationStrategy');
        $this->getContainer()->add('League\Route\Router');
    }
}
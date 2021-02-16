<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class ControllerServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        'Src\Controller\UserController',
        "Src\Controller\OOPSController"
    ];

    /**
     * @{inheritDoc}
     */
    public function register()
    {
        
        $this->getContainer()->add("Src\Controller\UserController")
            ->addArgument("League\Plates\Engine")
            ->addArgument("Laminas\Diactoros\Response")
            ->addArgument("Src\Model\UserModel");
        $this->getContainer()->add("Src\Controller\OOPSController")
            ->addArgument("League\Plates\Engine")
            ->addArgument("Laminas\Diactoros\Response");
    }
}
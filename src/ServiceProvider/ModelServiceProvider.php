<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class ModelServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = ['Src\Model\UserModel'];

    /**
     * @{inheritDoc}
     */
    public function register()
    {
        $this->getContainer()->add('Src\Model\UserModel')->addArgument('\PDO');
    }
}
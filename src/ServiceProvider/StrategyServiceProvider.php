<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class StrategyServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        'Src\Strategy\CustomStrategy',
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->add('Src\Strategy\CustomStrategy');
    }
}
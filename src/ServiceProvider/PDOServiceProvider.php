<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

class PDOServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        '\PDO',
        
    ];

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->getContainer()->share("\PDO", function(){

            return new \PDO(
                "mysql:dbname=" . DBASSETS['dbname'] . ";host=" . DBASSETS['host'],
                DBASSETS['username'],
                DBASSETS['password']
            );
        });
    }
}
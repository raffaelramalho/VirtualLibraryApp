<?php

namespace Src\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Plates\Engine;

class TemplateServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = ['League\Plates\Engine'];

    /**
     * @{inheritDoc}
     */
    public function register()
    {
        
        
        $this->getContainer()->share("League\Plates\Engine", function(){
            $templateEngine = new Engine(__DIR__."/../View/UI");

            $templateEngine->addFolder('Template', __DIR__."/../View/Template");
            $templateEngine->registerFunction('css', function ($string) {
                $csss = explode(",", $string);
                $links = array_map(function ($css){
                    return "<link rel=\"stylesheet\" href=\"src/View/css/{$css}.css\">";
                }, $csss);
                return $links;
            });
            
            return $templateEngine;
        });
    }
}
<?php
namespace Src\Controller;

use League\Plates\Engine;

class Controller{

    protected $view;

    public function __construct() {
        $this->view = new Engine(__DIR__."/../View/Ui");
    }
}
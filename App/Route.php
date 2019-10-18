<?php

namespace App;

use DESAFIO21\Init\Bootstrap;

class Route extends Bootstrap
{

    protected function initRoutes(){
        $routes['importar_arquivo'] = [
            'route' => '/importar',
            'controller' => 'ImportarController',
            'action' => 'index',
        ];
        $this->setRoute($routes);
    }

}
<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Routing_v3_finish\Middleware\Parser;

class RouteAction {

    private Config $config;
    public function __construct(Config $config)
    {
        $this->config = $config;
    }


    public function init()
    {
        $router = new Router();
        /*$router = new Routing(
            new Router()
        );*/

        $isTest = $router->isTestDomain()?'test':'prod';
        echo 'Is test: '.$isTest.'<br>';

        $isDev = $router->isDevMode()?'dev':'not dev';
        echo 'Is dev: '.$isDev;
        //$router->cutFromHost();




        //$router->isTestDomain(/*$_SERVER['HTTP_HOST']*/);
        //$router->getObj();

        //$parser = new Parser();
        //$parser->isTestServer();

        //var_dump($this->config->get('app_section'));
        //var_dump(Config::getConfig('app_mode'));
        //var_dump(Config::getConfig2()->app_sections);
    }
}
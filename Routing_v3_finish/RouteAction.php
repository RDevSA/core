<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Libs\DotEnv;

class RouteAction {

    public function init()
    {
        $router = new Router($_SERVER['HTTP_HOST']);
        /*$router = new RoutingFromURL(
            new Router()
        );*/


        $isTest = $router->isTestDomain()?'test':'prod';
        echo 'Is test: '.$isTest.'<br>';

        Dotenv::dotEnv($router->isDevMode());
        //TODO можно удалить
        $isDev = $router->isDevMode()?'dev':'not dev';
        echo 'Is dev: '.$isDev.'<br>';
        echo 'ENV: '.$_ENV['DB_USERNAME'].'<br>';

        $routingFromUrl = new RoutingFromURL($_SERVER['REQUEST_URI']);
        $arr = $routingFromUrl->getController().'<br>';
        print_r($arr);




        //$router->isTestDomain(/*$_SERVER['HTTP_HOST']*/);
        //$router->getObj();

        //$parser = new Parser();
        //$parser->isTestServer();

        //var_dump($this->config->get('app_section'));
        //var_dump(RouteUtils::getConfig('app_mode'));
        //var_dump(RouteUtils::getConfig2()->app_sections);
    }

}
<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Utils;

class Router {
    public function __construct()
    {
        //var_dump('Routing_v3_finish include!');
        //var_dump($_SERVER['HTTP_HOST']);
    }

    public function matchFromPath($host){
        $app_section = explode('.',$host);
        $length = count($app_section);
        
        Config::checkMatch(Utils::fromConfigFile('sections'));
        //$page ? explode('/', $page) : ['main'];
    }


    public function getObj(){
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}
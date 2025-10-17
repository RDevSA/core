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

        $config_sections = Utils::fromConfigFile('sections');
        if(!Config::checkMatch($config_sections))return;

        $app_section = explode('.',$host);
        $merge_sections = array_merge($app_section);
        print_r($merge_sections);
        $find = implode($config_sections['test_domain']);

        if (in_array($find,$merge_sections)){
            print_r('It is test domain');
        }else {print_r('It is production domain');}

        //$page ? explode('/', $page) : ['main'];
    }


    public function getObj(){
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}
<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Utils;

class Router {

    private array $config_sections;
    public function __construct( )
    {
        $this->config_sections = Utils::fromConfigFile('sections');
        //var_dump('Routing_v3_finish include!');
        //var_dump($_SERVER['HTTP_HOST']);
    }

    public function checkSection($host,$section):bool|null
    {
        if(!Config::checkMatch($this->config_sections))return null;

        $app_section = explode('.',$host);
        $merge_sections = array_merge($app_section);

        $find = implode($this->config_sections[$section]);

        if (in_array($find,$merge_sections)){
            print_r('It is test domain');
            return true;
        }else {
            print_r('It is production domain');
            return false;
        }

        //$page ? explode('/', $page) : ['main'];
    }





    public function getObj(){
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}
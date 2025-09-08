<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

class Router {
    public function __construct()
    {
        //var_dump('Routing_v3_finish include!');
        //var_dump($_SERVER['HTTP_HOST']);
    }

    public function matchFromPath($host){
        $app_section = explode('.',$host);
        $length = count($app_section);
        var_dump('app_section = ',$app_section,$length);
        //$page ? explode('/', $page) : ['main'];
    }
}
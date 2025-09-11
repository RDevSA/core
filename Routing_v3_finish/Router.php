<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

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
        var_dump('app_section = ',$app_section,$length);
        //$page ? explode('/', $page) : ['main'];
    }

    public function parseUrl()
    {
        $url =                      'https://garden.na4u.ru/';
        $url_admin =                'https://admin.garden.na4u.ru/';
        $url_dev =                  'https://dev.garden.na4u.ru/';
        $url_admin_dev =            'https://admin.dev.garden.na4u.ru/';
        $url_prod =                 'https://garden.ru/';
        $url_admin_prod =           'https://admin.garden.ru/';
        $url_admin_dev_prod =       'https://admin.dev.garden.ru/';


    }

    public function getObj(){
        $obj = Utils::fromArray(['data' => 123]);
        var_dump($obj->data);
    }
}
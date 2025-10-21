<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Utils;

class Router {

    private array $config_sections;
    public function __construct(
        private    $url =                      'garden.na4u.ru',
        private    $url_admin =                'admin.garden.na4u.ru',
        private    $url_dev =                  'dev.garden.na4u.ru',
        private    $url_admin_dev =            'admin.dev.garden.na4u.ru',
        private    $url_prod =                 'garden.ru',
        private    $url_admin_prod =           'admin.garden.ru',
        private    $url_admin_dev_prod =       'admin.dev.garden.ru',
    )
    {
        $this->config_sections = Utils::fromConfigFile('sections');
        //var_dump('Routing_v3_finish include!');
        //var_dump($_SERVER['HTTP_HOST']);
    }

    private function hostToArray():array
    {
        $host_to_array = explode('.',$this->url_prod);
        return array_merge($host_to_array);
    }

    public function isTestDomain():bool
    {

        $find = implode($this->config_sections['test_domain']);

        if (in_array($find,$this->hostToArray())){
            print_r('It is test domain');
            return true;
        }else {
            print_r('It is production domain');
            return false;
        }

        //$page ? explode('/', $page) : ['main'];
    }

    public function getSections()
    {
        $test = $this->hostToArray();
        $count = $this->isTestDomain()?3:2;
        $t = count($test)-$count;
        
        $modified_host = $t>0?array_slice($test,0,$t):'main';

        print_r($modified_host);
    }





    public function getObj(){
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}
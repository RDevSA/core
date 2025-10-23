<?php

declare(strict_types=1);

namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Utils;

class Router
{

    const IS_TEST_SERVER = 3;
    const NOT_TEST_SERVER = 2;

    private $url = 'garden.na4u.ru';
    private $url_admin = 'admin.garden.na4u.ru';
    private $url_dev = 'dev.garden.na4u.ru';
    private $url_admin_dev = 'admin.dev.garden.na4u.ru';
    private $url_prod = 'garden.ru';
    private $url_admin_prod = 'admin.garden.ru';
    private $url_admin_dev_prod = 'admin.dev.garden.ru';
    private $url_admin_dev_5 = 'admin.dev.garden.na5u.ru';
    private $url_admin_6 = 'admin.garden.na6u.ru';

    private array $config_sections;

    public function __construct()
    {
        $this->config_sections = Utils::fromConfigFile('sections');
    }

    private function hostToArray(): array
    {
        $host_to_array = explode('.', $this->url_admin_dev_prod);
        return array_merge($host_to_array);
    }

    public function isTestDomain():bool
    {
        
        $domains = $this->config_sections['test_domain'];

        foreach($domains as $domain){
            in_array($domain,$this->hostToArray());
            if(in_array($domain,$this->hostToArray())){
                
                return true;
            } 
        }
        return false;

        //$page ? explode('/', $page) : ['main'];
    }

    public function cutFromHost(): int
    {
        $test_domains = implode($this->config_sections['test_domain']);


        $length = in_array($test_domains,$this->hostToArray())?self::IS_TEST_SERVER:self::NOT_TEST_SERVER;

        $t = $this->isTestDomain()?'true':'false';
        print_r($t);

        return $length;

    }


    public function getObj()
    {
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}

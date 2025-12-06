<?php

declare(strict_types=1);

namespace Core\Routing_v3_finish\Parsing;

use Core\Utils;

class ParseHost
{
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

    public function __construct(private readonly string $host = '')
    {
        $this->config_sections = Utils::fromConfigFile('sections');
    }

    private function hostToArray(): array
    {
        $host_to_array = $this->host ?explode('.', $this->host): explode('.', $this->url_dev);
        return array_merge($host_to_array);
    }

    /**
     * @return bool
     */
    public function isTestDomain(): bool
    {
        $domains = $this->config_sections['test_domain'];
        $res = array();

        foreach ($domains as $domain) {
            $res[] = in_array($domain, $this->hostToArray());
        }

        return in_array(true, $res);

        //$page ? explode('/', $page) : ['main'];
    }


    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        $app_mode = $this->config_sections['app_mode'];
        $first_item = $this->hostToArray()[0];
        $second_item = $this->hostToArray()[1];

        return in_array($first_item, $app_mode) || in_array($second_item, $app_mode);
    }

    public function getAppSection():string|bool
    {

        $first_item = $this->hostToArray()[0];
        $finds = $this->config_sections['app_section'];

        $section = in_array($first_item,$finds);
        if (!$section && $this->isDevMode() || !$section && !$this->isDevMode()){
            $first_item = 'public';
        }

        return $first_item;
    }


    public function getObj()
    {
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}

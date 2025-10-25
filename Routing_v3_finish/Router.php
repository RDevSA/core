<?php

declare(strict_types=1);

namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Utils;

class Router
{

    const IS_TEST_SERVER = 3;
    const NOT_TEST_SERVER = 2;

    private string $test_domain;


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
        $host_to_array = explode('.', $this->url_admin_prod);
        return array_merge($host_to_array);
    }

    private function isTestDomain(): bool
    {
        $domains = $this->config_sections['test_domain'];

        foreach ($domains as $domain) {

            if (in_array($domain, $this->hostToArray())) {
                $this->test_domain = $domain;
                return true;
            }
        }
        return false;

        //$page ? explode('/', $page) : ['main'];
    }

    /**
     * @return array
     */
    public function cutFromHost(): array
    {
        $length = $this->isTestDomain() ? self::IS_TEST_SERVER : self::NOT_TEST_SERVER;
        $host = $this->hostToArray();
        $splice = count($this->hostToArray())-$length;
        return array_splice($host,0,$splice);

    }

    public function getTestDomain(): string
    {
        return $this->test_domain;
    }


    public function getObj()
    {
        $obj = Utils::fromArray(['data' => '123']);
        var_dump($obj);
    }
}

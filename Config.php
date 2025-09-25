<?php

namespace Core;

class Config
{

    private array $configArray;

    public function __construct()
    {
        $this->configArray = require_once __DIR__.'/config/config.php';
    }

    /**
     * @return array
     */
    public function testGetConfigs():array
    {
        $merge = array();
        foreach ($this->configArray as $config){
            $config = require_once __DIR__.'/config/'.$config;
            $merge[]=$config;
        }
        return array_merge($merge);
    }

    /**
     * @param string $key
     * @return array|null
     */
    public static function getConfig(string $key):array|null
    {
        $config = require_once __DIR__.'/config/sections.php';
        return $config[$key]??null;
    }

}
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
    public function get(string $key)
    {
        $merge = array();
        foreach ($this->configArray as $config){
            $config = require_once __DIR__.'/config/'.$config;
            $merge[]=$config;
        }
        $test = array_merge($merge);
        return $test;
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
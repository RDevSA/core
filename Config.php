<?php

namespace Core;

class Config
{
    private array $configArray;

    public function __construct()
    {
        $this->configArray = require_once __DIR__.'/config/config.php';
    }

    private function testGetConfigs()
    {
        foreach ($this->configArray as $config){
            $config = require_once __DIR__.'/config/'.$config;
        }
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


    public static function getConfig2(){
        $array = require_once __DIR__.'/config/sections.php';
        $config = (object) $array;
        return $config;
    }


}
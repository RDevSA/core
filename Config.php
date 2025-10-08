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

    public static function checkMatch(array $arrays)
    {
        $merge = array();
        foreach($arrays as $array){
            $merge[]=$array;
        }

        print_r(array_merge([],...$merge));
    }

}
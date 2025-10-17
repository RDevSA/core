<?php

namespace Core;

class Config
{

    private array $configArray;

    public function __construct()
    {
        $this->configArray = require_once __DIR__ . '/config/config.php';
    }

    /**
     * @return array
     */
    public function get(string $key)
    {
        $merge = array();
        foreach ($this->configArray as $config) {
            $config = require_once __DIR__ . '/config/' . $config;
            $merge[] = $config;
        }
        $test = array_merge($merge);
        return $test;
    }

    /**
     * @param array $arrays
     * @return bool
     */
    public static function checkMatch(array $arrays):bool
    {
        $sections = array();
        
        foreach ($arrays as $array) {
            $sections[] = $array;
        }
        $merge = array_merge(...$sections);

        if (count(array_unique($merge)) === count($merge)){
            print_r('Not found repeat');
            return true;
        }else{
            print_r('Found repeat');
            return false;
        }

    }

}
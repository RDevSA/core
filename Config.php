<?php

namespace Core;

class Config
{


    /**
     * @return array
     */
    public function get(string $key)
    {
        $merge = array();
        foreach (Utils::fromConfigFile('config') as $config) {
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
<?php

namespace Core\Routing_v3_finish;

use Core\Utils;

class RouteUtils
{

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
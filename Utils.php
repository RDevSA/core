<?php

declare(strict_types=1);

namespace Core;

use InvalidArgumentException;
use ValueError;

class Utils
{
    const FILE_NOT_FOUND = 'file not found';

    public static function fromArray(array $data = [])
    {
        foreach (get_object_vars($obj = new self) as $property => $default) {
            if (!array_key_exists($property, $data)) continue;
            $obj->{$property} = $data[$property]; // assign value to object
        }
        return $obj;
    }

    //TODO add error handler
    /**
     * @param string $fileName
     * @return array
     */
    public static function fromConfigFile(string $fileName): array {

        $array = require_once __DIR__.'/config/'.$fileName.'.php';
        return $array;
        
    }
}

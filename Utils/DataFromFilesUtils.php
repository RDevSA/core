<?php

namespace Core\Utils;
class DataFromFilesUtils
{
    public static function getArrayData(string $source=CONFIG_PAGES):array
    {
        $test = require_once $source;
        $layouts = $test["layouts"];
        $modules = $test['modules']['main'];
        return [$layouts,$modules];
    }
}
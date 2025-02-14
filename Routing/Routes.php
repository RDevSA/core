<?php

namespace core\Routing;

class Routes
{
    public static function isRoute(string $path):bool
    {
        $modules = require_once 'config/modules.php';
        $controllers = $modules['controllers'];

        return in_array($path,$controllers);
    }



}

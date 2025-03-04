<?php

namespace Core\Routing;

class Routes
{
    public static function isRoute(string $path):bool
    {
        $modules = require_once './modules.php';
        $controllers = $modules['controllers'];

        return in_array($path,$controllers);
    }



}

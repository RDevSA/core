<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

use Core\Config;
use Core\Routing_v3_finish\Middleware\Parser;

class RouteAction {
    public function init()
    {
        $route = new Router();
        //$route->matchFromPath($_SERVER['HTTP_HOST']);
        //$route->getObj();

        $parser = new Parser();
        $parser->isTestServer();

        //var_dump(Config::getConfig('app_mode'));
        var_dump(Config::getConfig2()->app_sections);
    }
}
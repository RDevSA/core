<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

class RouteAction {
    public function init()
    {
        $route = new Router();
        //$route->matchFromPath($_SERVER['HTTP_HOST']);
        $route->getObj();
    }
}
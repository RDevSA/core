<?php
declare(strict_types=1);
namespace Core\Routing_v3_finish;

class Router {
    public function __construct()
    {
        var_dump('Routing_v3_finish include!');
        var_dump($_SERVER['HTTP_HOST']);
    }

    private function matchFromPath($host){

    }
}
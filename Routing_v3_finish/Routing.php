<?php

namespace Core\Routing_v3_finish;

class Routing
{
    public function __construct(public Router $router = new Router())
    {

    }

    public function r()
    {
        $length = $this->router->cutFromHost();
        match ($length){
            '0'=>'456',
            '1'=>'789',
            default=>'Not found'

        };
    }
}
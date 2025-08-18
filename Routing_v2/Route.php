<?php

declare(strict_types=1);

namespace Core\Routing_v2;

class Route {

    public function __construct(
        private string $name,
        private string $path,
        private array $params,
        private array $methods=['GET']
    )
    {
        if ($this->methods === []){
            throw new \InvalidArgumentException('HTTP methods argument was empty; must contain at least one method');
        }
    }


}
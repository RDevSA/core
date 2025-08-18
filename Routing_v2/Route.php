<?php

declare(strict_types=1);

namespace Core\Routing_v2;

class Route {

    /**
     * @param string $name
     * @param string $path
     * @param array $params
     * @param array $methods
     */
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
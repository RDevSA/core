<?php

namespace Core\Routing_v2;

use ArrayIterator;
use UrlGenerator;

final class Router {

    private const NO_ROUTE = 404;

    private \ArrayIterator $routes;

    private UrlGenerator $urlGenerator;

    public function __construct(array $routes = [])
    {
        $this->routes = new \ArrayIterator();
        $this->urlGenerator = new UrlGenerator($this->routes);
        foreach($routes as $route){
            $this->add($route);
        }

        echo 'Class Router connect'; 
    }

}
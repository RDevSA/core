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

    public function add(Route $route):self
    {
        $this->routes->offsetSet($route->getName(),$route);
        return $this;
    }

    public function match(ServerRequestInterface $serverRequest):Route
    {
        return $this->matchFromPath($serverRequest->getUri()->getPath(),$serverRequest->getMethod());
    }

    public function matchFromPath(string $path, string $method){

        foreach($this->routes as $route){
            if($route->match($path,$method)==false){
                continue;
            }
            return $route;
        }

        throw new \Exception(
             'No route found for ' . $method,
             self::NO_ROUTE
        );

    }



}
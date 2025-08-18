<?php

declare(strict_types=1);

namespace Core\Routing_v2;

use ArrayIterator;
use Exception;
use UrlGenerator;

final class Router {

    private const int NO_ROUTE = 404;

    private ArrayIterator $routes;

    private UrlGenerator $urlGenerator;

    public function __construct(array $routes = [])
    {
        $this->routes = new ArrayIterator();
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

    /**
     * @throws Exception
     */
    public function matchFromPath(string $path, string $method){

        foreach($this->routes as $route){
            if(!$route->match($path, $method)){
                continue;
            }
            return $route;
        }

        throw new Exception(
             'No route found for ' . $method,
             self::NO_ROUTE
        );

    }

    public function generateUri(string $name,array $params=[]):string
    {
        return $this->urlGenerator->generate($name,$params);
    }

    public function getUrlGenerator():UrlGenerator
    {
        return $this->urlGenerator;
    }



}
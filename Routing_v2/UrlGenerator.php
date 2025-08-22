<?php

declare(strict_types=1);

namespace Core\Routing_v2;

use InvalidArgumentException;

class UrlGenerator
{

    public function __construct(private \ArrayAccess $routes) {}

    public function generate(string $name, array $params = []): string
    {
        if ($this->routes->offsetExists($name) === false) {
            throw new InvalidArgumentException(sprintf('Unknown %s name route', $name));
        }
        $route = $this->routes[$name];

        if ($route->hasVars() && $params === []) {
            throw new InvalidArgumentException(sprintf('%s route need parameters: %s', $name, implode(',', $route->getVarsNames())));
        }

        return self::resolveUri($route, $params);
    }

    private static function resolveUri(Route $route, array $params = []):string
    {
        $uri = $route->getPath();
        foreach($route->getVarsNames() as $variable){
            $varName = trim($variable,'{\}');
            if(array_key_exists($varName,$params)===false){
                throw new InvalidArgumentException(sprintf('%s not found in parameters to generate url', $varName));
            }
            $uri = str_replace($variable,$params[$varName],$uri);
        }
        return $uri;
    }
}

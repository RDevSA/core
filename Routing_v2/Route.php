<?php

declare(strict_types=1);

namespace Core\Routing_v2;

class Route {

    /**
     * @param string $name
     * @param string $path
     * @param array $params
     *      $parameters = [
     *       0 => (string) Controller name : HomeController::class.
     *       1 => (string|null) Method name or null if invoke method
     *      ]
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

    public function match(string $path, string $method):bool
    {
        $regex = $this->getPath();
        foreach ($this->getVarsNames() as $variable){
            $varName = trim($variable,'{\}');
            $regex = str_replace($variable,'(?P<' . $varName . '>[^/]++)', $regex);
        }
    }


}
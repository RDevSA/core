<?php

declare(strict_types=1);

namespace Core\Routing_v2;

use InvalidArgumentException;

class Route
{

    private $vars = [];

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
        private array $methods = ['GET']
    ) {
        if ($this->methods === []) {
            throw new InvalidArgumentException('HTTP methods argument was empty; must contain at least one method');
        }
    }

    /**
     * @param string $path
     * @param string $method
     * @return bool
     */
    public function match(string $path, string $method): bool
    {
        $regex = $this->getPath();
        foreach ($this->getVarsNames() as $variable) {
            $varName = trim($variable, '{\}');
            $regex = str_replace($variable, '(?P<' . $varName . '>[^/]++)', $regex);
        }

        if (in_array($method, $this->getMethods()) && preg_match('^#' . $regex . '$#sD', self::trimPath($path), $matches)) {
            $values = array_filter($matches, static function ($key) {
                return is_string($key);
            }, ARRAY_FILTER_USE_KEY);
            foreach ($values as $key => $value) {
                $this->vars[$key] = $value;
            }
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @return array
     */
    public function getVarsNames(): array
    {
        preg_match_all('/{[^}]*}/', $this->path, $matches);
        return reset($matches) ?? [];
    }

    public function hasVars(): bool
    {
        return $this->getVarsNames() !== [];
    }

    /**
     * @return array
     */
    public function getVars(): array
    {
        return $this->vars;
    }

    /**
     * @param string $path
     * @return string
     */
    public static function trimPath(string $path): string
    {
        return '/' . rtrim(ltrim(trim($path), '/'), '/');
    }
}

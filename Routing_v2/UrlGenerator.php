<?php

declare(strict_types=1);

namespace Core\Routing_v2;

class UrlGenerator
{

    public function __construct(private \ArrayAccess $routes) {}
}

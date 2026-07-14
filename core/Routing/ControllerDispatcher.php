<?php

declare(strict_types=1);

namespace Core\Routing;

use Core\Container\Container;

class ControllerDispatcher
{
    public function __construct(
        private readonly Container $container
    ) {}

    public function dispatch(Route $route): mixed
    {
        [$controller, $method] = $route->action();
        $controller = $this->container->make($controller);
        return $controller->$method();
    }
}

<?php

declare(strict_types=1);

namespace Core\Routing;

class ControllerDispatcher
{
    public function dispatch(Route $route): mixed
    {
        [$controller, $method] = $route->action();
        $controller = new $controller();
        return $controller->$method();
    }
}
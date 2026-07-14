<?php

namespace Core\Routing;

use Core\Http\Request;

use Core\Container\Container;

class Router
{
    private array $routes = [];
    private ControllerDispatcher $dispatcher;

    public function __construct(private readonly Container $container)
    {
        $this->dispatcher = new ControllerDispatcher($this->container);
    }

    public function get(string $uri, array $action): void
    {
        $this->routes[] = new Route(
            'GET',
            $uri,
            $action
        );
    }

    public function post(string $uri, array $action): void
    {
        $this->routes[] = new Route(
            'POST',
            $uri,
            $action
        );
    }

    public function dispatch(Request $request): mixed
    {
        $method = $request->method();
        $uri = $request->uri();

        foreach ($this->routes as $route) {

            if (
                $route->method() === $method &&
                $route->uri() === $uri
            ) {
                return $this->dispatcher->dispatch($route);
            }
        }

        http_response_code(404);
        return "404 Not Found";
    }
}

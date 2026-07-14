<?php

namespace Core\Routing;

use Core\Http\Request;

class Router
{
    private array $routes = [];
    private ControllerDispatcher $dispatcher;

    public function __construct()
    {
        $this->dispatcher = new ControllerDispatcher();
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

<?php

namespace Core\Routing;

class Router
{
    private array $routes = [];

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

    public function dispatch(): mixed
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        foreach ($this->routes as $route) {

            if (
                $route->method() === $method &&
                $route->uri() === $uri
            ) {
                return $this->runRoute($route);
            }
        }

        http_response_code(404);
        return "404 Not Found";
    }
    private function runRoute(Route $route): mixed
    {
        [$controller, $method] = $route->action();
        $controllerInstance = new $controller();
        return $controllerInstance->$method();
    }
}

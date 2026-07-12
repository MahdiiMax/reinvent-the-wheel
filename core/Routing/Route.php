<?php

namespace Core\Routing;

class Route
{
    public function __construct(
        private readonly string $method,
        private readonly string $uri,
        private readonly array $action
    ) {}

    public function method(): string
    {
        return $this->method;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function action(): array
    {
        return $this->action;
    }
}

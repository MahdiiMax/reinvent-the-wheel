<?php

declare(strict_types=1);

namespace Core\Http;
    
class Request
{
    public function __construct(
        private readonly string $method,
        private readonly string $uri
    ) {}
    public static function capture(): self
    {
        return new self(
            $_SERVER['REQUEST_METHOD'],
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
    }
    public function method(): string
    {
        return $this->method;
    }
    public function uri(): string
    {
        return $this->uri;
    }
}

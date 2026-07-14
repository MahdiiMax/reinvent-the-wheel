<?php

declare(strict_types=1);

namespace Core\Container;

class Container
{
    public function make(string $class): object
    {
        return new $class();
    }
}
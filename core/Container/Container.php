<?php

declare(strict_types=1);

namespace Core\Container;

use ReflectionClass;
use ReflectionNamedType;

class Container
{
    private array $bindings = [];

    public function make(string $class): object
    {
        if (isset($this->bindings[$class])) {
            $class = $this->bindings[$class];
        }
        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        if (!$constructor) {
            return new $class();
        }
        $dependencies = [];
        foreach ($constructor->getParameters() as $parameter) {
            $type = $parameter->getType();
            if (!$type instanceof ReflectionNamedType) {
                throw new \Exception("Cannot resolve dependency");
            }
            $dependencies[] = $this->make(
                $type->getName()
            );
        }

        return $reflection->newInstanceArgs($dependencies);
    }

    public function bind(string $abstract, string $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }
}

<?php

declare(strict_types=1);

namespace Core\Container;

use ReflectionClass;
use ReflectionNamedType;

class Container
{
    public function make(string $class): object
    {
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
}

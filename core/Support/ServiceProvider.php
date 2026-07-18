<?php

declare(strict_types=1);

namespace Core\Support;

use Core\Container\Container;

abstract class ServiceProvider
{
    public function __construct(
        protected Container $container
    ) {}

    abstract public function register(): void;
}

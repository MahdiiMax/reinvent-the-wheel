<?php

declare(strict_types=1);

namespace App\Providers;

use Core\Database\Database;
use Core\Database\MySQLDatabase;
use Core\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->container->bind(
            Database::class,
            MySQLDatabase::class
        );
    }
}
<?php

namespace App\Services;

use Core\Database\Database;

class TestService
{
    public function __construct(
        private Database $database
    ) {}

    public function test(): string
    {
        return $this->database->connect();
    }
}

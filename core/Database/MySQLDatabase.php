<?php

namespace Core\Database;

class MySQLDatabase implements Database
{
    public function connect(): string
    {
        return "Database Connected";
    }
}

<?php

namespace Core\Database;

interface Database
{
    public function connect(): string;
}
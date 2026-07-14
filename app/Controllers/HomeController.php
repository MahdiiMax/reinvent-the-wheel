<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Http\Response;

class HomeController
{
    public function index(): Response
    {
        return new Response('Hello from Home Controller');
    }
}
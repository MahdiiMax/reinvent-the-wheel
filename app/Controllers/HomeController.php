<?php

namespace App\Controllers;

use App\Services\TestService;
use Core\Http\Response;

class HomeController
{
    public function __construct(
        private TestService $service
    ) {}

    public function index(): Response
    {
        return view('home', [
            'title' => 'Welcome to Reinvent The Wheel'
        ]);
    }
}

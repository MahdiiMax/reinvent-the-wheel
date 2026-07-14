<?php

namespace App\Controllers;

use App\Services\UserService;
use Core\Http\Response;

class HomeController
{
    public function __construct(
        private UserService $service
    ) {
    }


    public function index(): Response
    {
        return new Response(
            $this->service->hello()
        );
    }
}
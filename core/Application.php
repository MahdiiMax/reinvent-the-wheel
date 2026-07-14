<?php

namespace Core;

use Core\Routing\Router;
use Core\Http\Request;

class Application
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(): void
    {
        $router = $this->router;
        require_once __DIR__ . '/../routes/web.php';
        $request = Request::capture();
        $response = $this->router->dispatch($request);
        $response->send();
    }
}
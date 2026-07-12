<?php

namespace Core;

use Core\Routing\Router;

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
        echo $this->router->dispatch();
    }
}

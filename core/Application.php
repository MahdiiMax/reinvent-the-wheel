<?php

declare(strict_types=1);

namespace Core;

use Core\Container\Container;
use Core\Http\Request;
use Core\Routing\Router;
use App\Providers\DatabaseServiceProvider;

class Application
{
    private Container $container;
    private Router $router;

    public function __construct()
    {
        $this->container = new Container();
        (new DatabaseServiceProvider(
            $this->container
        ))->register();
        $this->router = new Router($this->container);
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

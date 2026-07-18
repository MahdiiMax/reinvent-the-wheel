<?php

use Core\Http\Response;
use Core\View\View;

function view(string $view, array $data = []): Response
{
    return new Response(
        View::render($view, $data)
    );
}

function base_path(string $path = ''): string
{
    return dirname(__DIR__, 2) . '/' . ltrim($path, '/');
}
<?php

declare(strict_types=1);

namespace Core\View;

class View
{
    public static function render(string $view, array $data = []): string
    {
        extract($data);
        ob_start();
        require base_path("app/Views/{$view}.php");
        return ob_get_clean();
    }
}
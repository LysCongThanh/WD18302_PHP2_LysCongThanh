<?php

namespace app\helpers;

use app\core\Application;

class NavHelpers
{

    private static $instance;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function isNavLinkActive($url): string
    {
        $currentPath = trim(Application::$app->request->getPath(), '/');
        $url = trim($url, '/');

        // Kiểm tra xem $url có là một phần của $currentPath hay không
        if ($currentPath === $url) {
            return 'active';
        }

        return '';
    }
}

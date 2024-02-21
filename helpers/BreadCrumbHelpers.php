<?php

namespace app\helpers;

use app\core\Application;

class BreadcrumbHelpers
{

    private static $instance;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private static function getUrl()
    {
        $path = Application::$app->request->getPath();
        $parts = explode('/', trim($path, '/'));
        $parts = array_filter($parts);

        if (empty($parts)) {
            $parts[] = 'Home';
        }

        return $parts;
    }

    public static function generate(): string
    {
        $breadcrumbItems = self::getUrl();
        $baseURL = '';

        $breadcrumbHtml = '
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="text-white" href="javascript:;">
                <i class="ni ni-box-2"></i>
            </a>
        </li>
    ';

        foreach ($breadcrumbItems as $index => $item) {
            $baseURL .= '/' . $item;
            $href = ($item === 'Home') ? '' : $baseURL;
            $breadcrumbHtml .= '
        <li class="breadcrumb-item text-sm text-white">
            <a class="opacity-5 text-white" href="' . $href . '">' . $item . '</a>
        </li>
        ';
        }

        $breadcrumbHtml .= '</ol>';

        return $breadcrumbHtml;
    }
}

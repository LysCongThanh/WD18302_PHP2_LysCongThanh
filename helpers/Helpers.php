<?php

namespace app\helpers;

use AllowDynamicProperties;

#[AllowDynamicProperties] class Helpers {

    private static ?self $helpers = null;
    public NavHelpers $navHelpers;
    public BreadcrumbHelpers $breadCrumbHelpers;
    public FormatHelpers $formatHelpers;

    public function __construct()
    {   
        $this->navHelpers = NavHelpers::getInstance();
        $this->breadCrumbHelpers = BreadcrumbHelpers::getInstance();
        $this->formatHelpers = FormatHelpers::getInstance();
    }

    public static function getHelpers(): self
    {
        if (self::$helpers === null) {
            self::$helpers = new self();
        }

        return self::$helpers;
    }
}
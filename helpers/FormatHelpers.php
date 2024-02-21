<?php

namespace app\helpers;

use DateTime;

class FormatHelpers {

    private static $instance;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function date_formatted(string $date): string {
        $dateTime = new DateTime($date);
        return $dateTime->format('d/m/Y - H:i');
    }
    
}
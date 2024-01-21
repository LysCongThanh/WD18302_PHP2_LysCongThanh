<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$web_root = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

return [
    'url' => $web_root,
    'api_prefix' => 'api'
];

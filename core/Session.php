<?php

namespace app\core;

class Session
{

    /**
     *
     */
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION['flash_message'] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }

        $_SESSION['flash_message'] = $flashMessages;
    }

    /**
     * @param $key
     * @param $message
     * @return void
     */
    public function setFlash($key, $message): void
    {
        $_SESSION['flash_message'][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }

    /**
     * @param $key
     * @return false|mixed
     */
    public function getFlash($key): mixed
    {
        return $_SESSION['flash_message'][$key]['value'] ?? false;
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return false|mixed
     */
    public function get($key): mixed
    {
        return $_SESSION[$key] ?? false;
    }

    /**
     * @param $key
     * @return void
     */
    public function remove($key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     *
     */
    public function __destruct()
    {
        $flashMessages = $_SESSION['flash_message'] ?? [];
        foreach ($flashMessages as $key => $flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION['flash_message'] = $flashMessages;
    }
}
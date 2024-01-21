<?php

namespace app\core;

class Request
{

    /**
     * @return string
     */
    public  function getPath() : string {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if(!$position) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * @return bool
     */
    public function isGet() : bool {
        return $this->getMethod() === 'get';
    }

    /**
     * @return bool
     */
    public function isPost() : bool {
        return $this->getMethod() === 'post';
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        $body = [];
        if($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

}
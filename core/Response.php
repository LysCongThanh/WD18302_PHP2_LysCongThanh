<?php

namespace app\core;

class Response
{
    protected $statusCode;
    protected $headers = [];
    protected $body;

    public function __construct($body = '', $statusCode = 200)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function setJsonContent($data)
    {
        $this->setHeader('Content-Type', 'application/json');
        $this->body = json_encode($data);
        return $this;
    }

    public function redirect($url, $statusCode = 302)
    {
        $this->setStatusCode($statusCode)
            ->setHeader('Location', $url)
            ->send();
        exit;
    }

    public function setCookie($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        return $this;
    }

    public function send()
    {
        // Set HTTP status code
        http_response_code($this->statusCode);

        // Set headers
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }

        // Send body
        echo $this->body;
    }
}
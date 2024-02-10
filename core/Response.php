<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    protected mixed $statusCode;
    protected array $headers = [];
    protected mixed $body;

    /**
     * @param string $body
     * @param int $statusCode
     */
    public function __construct(string $body = '', int $statusCode = 200)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function setHeader($name, $value): static
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setJsonContent($data): static
    {
        $this->setHeader('Content-Type', 'application/json');
        $this->body = json_encode($data);
        return $this;
    }

    /**
     * @param $url
     * @param int $statusCode
     * @return void
     */
    #[NoReturn] public function redirect($url, int $statusCode = 302): void
    {
        $this->setStatusCode($statusCode)
            ->setHeader('Location', $url)
            ->send();
        exit;
    }

    /**
     * @param $name
     * @param $value
     * @param int $expire
     * @param string $path
     * @param $domain
     * @param $secure
     * @param $httponly
     * @return $this
     */
    public function setCookie($name, $value, int $expire = 0, string $path = '/', string $domain = '', false $secure = false, false $httponly = false): Response
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        return $this;
    }

    /**
     * @return void
     */
    public function send(): void
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
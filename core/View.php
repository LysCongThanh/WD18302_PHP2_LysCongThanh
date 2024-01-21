<?php

namespace app\core;

class View
{
    public string $title = '';

    /**
     * @param $view
     * @param $params
     * @return array|string|null
     */
    public function renderView($view, $params = []): array|string|null
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent($params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * @param $params
     * @return false|string
     */
    protected function layoutContent($params = []): false|string
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        $params['title'] = $this->title;

        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * @param $view
     * @param $params
     * @return false|string
     */
    protected function renderOnlyView($view, $params = []): false|string
    {
        $params['app'] = Application::$app;

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}

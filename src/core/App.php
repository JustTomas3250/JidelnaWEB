<?php

class App {
    protected $controller = 'JidloController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $urlParts = $this->parseUrl();

        require_once '../routes.php';

        $urlSet = false;

        for ($i = 0; $i < count($urlParts); $i++) {
            $route = join('/', array_slice($urlParts, 0, $i + 1));

            if (isset($routes[$route]) && $routes[$route]['params'] == (count($urlParts) - $i - 1)) {
                $this->controller = $routes[$route]['controller'];
                $this->method = $routes[$route]['method'];
                $this->params = array_slice($urlParts, $i + 1);
                $urlSet = true;
                break;
            }
        }

        if (!$urlSet) {
            echo "404 - Route Not found!";
            return;
        }

        require_once '../controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [''];
    }
}

?>
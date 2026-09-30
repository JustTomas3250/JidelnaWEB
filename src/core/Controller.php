<?php

class Controller {
    protected function loadModel($model)
    {
        require_once '../models/' . $model . '.php';
        return new $model;
    }

    protected function renderView($viewPath, $data = [], $title = "Jidelna")
    {
        extract($data);
        require_once '../views/layout.php';
    }
}

?>
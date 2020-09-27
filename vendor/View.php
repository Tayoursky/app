<?php
namespace vendor;

class View
{
    public $route = [];

    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->layout = $layout ?: 'default';
        $this->view = $view;
    }

    public function render($vars)
    {

        $file_view = ROOT . "/views/{$this->route['controller']}/{$this->view}.php";

        if (is_array($vars)) extract($vars);

        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p>Не найден вид! $file_view</p>";
        }
        $content = ob_get_clean();


        $file_layout = ROOT . "/views/layouts/{$this->layout}.php";

        if (is_file($file_layout)) {
            require $file_layout;
        } else {
            echo "<p>Не найден шаблон! $file_layout</p>";
        }
    }
}
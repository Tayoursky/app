<?php
namespace vendor;

abstract class Controller
{
    public $route = [];
    public $layout;
    public $view;
    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $obj = new View($this->route, $this->layout, $this->view);
        $obj->render($this->vars);
    }

    public function set($vars)
    {
        $this->vars = $vars;
    }

    public function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    public function setMessage($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    public function getMessage($key)
    {
        return $_SESSION[$key];
    }
}
<?php
namespace vendor;

Class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function  getRoute()
    {
        return self::$route;
    }

    protected static function  matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key))
                        $route[$key] = $value;
                }
                if (!isset($route['action']))
                    $route['action'] = 'index';

                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);

        if (self::matchRoute($url)) {
            $controller = 'controllers\\' . self::upperCamelCase(self::$route['controller']) . 'Controller';
            if (class_exists($controller)) {
                $obj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');

                if (method_exists($obj, $action)) {
                    $obj->$action();
                    $obj->getView();
                } else {
                    echo "Метод <b>$controller::$action</b> не найден!";
                }
            } else {
                echo "Контроллер <b>$controller</b> не найден!";
            }
        } else {
            http_response_code(404);
            include '../views/error.php';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-',' ', $name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }
        }
        return '';
    }

}
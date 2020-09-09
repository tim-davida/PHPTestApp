<?php

class Router {

    // Массив марштутов
    public static $ROUTES = array();
    
    // Метод добавления маршрутов
    public static function addRoute($route, $function)
    {
        self::$ROUTES[$route] = $function;
    }
    
    // Метод перехода по марштуту
    public static function goRoute($route)
    {
        // Если указанный маршрут имеется, то вызываем соответствующий метод
        if (isset(self::$ROUTES[$route]))
        {
            self::$ROUTES[$route]->__invoke();
        }
        // Иначе возвращаем ответ 404
        else
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }
    }
}
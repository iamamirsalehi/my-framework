<?php

namespace App\Core\Routing;

class Route
{
    private static $routes = [];

    public static function add(string|array $method, $uri ,$action)
    {
        self::$routes[] = [$method, $uri, $action];
    }

    public static function get(string $uri, string $action)
    {
        self::add('get', $uri, $action); 
    }

    public static function post(string $uri, string $action)
    {
        self::add('post', $uri, $action); 
    }

    public static function put(string $uri, string $action)
    {
        self::add('put', $uri, $action); 
    }

    public static function patch(string $uri, string $action)
    {
        self::add('patch', $uri, $action); 
    }

    public static function delete(string $uri, string $action)
    {
        self::add('delete', $uri, $action); 
    }

    public static function options(string $uri, string $action)
    {
        self::add('options', $uri, $action); 
    }

    public static function getRoutes()
    {
        return self::$routes;    
    }
}
<?php

namespace App\Core\Routing;

class Route
{
    private static $routes = [];

    public static function add(string|array $method, $uri, string|callable $action)
    {
        self::$routes[] = ['methods' => !is_array($method) ? [$method] : $method, 'uri' => $uri, 'action' => $action];
    }

    public static function get(string $uri, string|callable $action)
    {
        self::add('get', $uri, $action);
    }

    public static function post(string $uri, string|callable $action)
    {
        self::add('post', $uri, $action);
    }

    public static function put(string $uri, string|callable $action)
    {
        self::add('put', $uri, $action);
    }

    public static function patch(string $uri, string|callable $action)
    {
        self::add('patch', $uri, $action);
    }

    public static function delete(string $uri, string|callable $action)
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
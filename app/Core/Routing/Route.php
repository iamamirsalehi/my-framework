<?php

namespace App\Core\Routing;

class Route
{
    private static $routes = [];

    public static function add(string|array $method, $uri, string|callable $action, $middleware = [])
    {
        self::$routes[] = ['methods' => !is_array($method) ? [$method] : $method, 'uri' => $uri, 'action' => $action, 'middleware' => $middleware];
    }

    public static function get(string $uri, string|callable $action, $middleware = [])
    {
        self::add('get', $uri, $action, $middleware);
    }

    public static function post(string $uri, string|callable $action, $middleware = [])
    {
        self::add('post', $uri, $action, $middleware);
    }

    public static function put(string $uri, string|callable $action, $middleware = [])
    {
        self::add('put', $uri, $action, $middleware);
    }

    public static function patch(string $uri, string|callable $action, $middleware = [])
    {
        self::add('patch', $uri, $action, $middleware);
    }

    public static function delete(string $uri, string|callable $action, $middleware = [])
    {
        self::add('delete', $uri, $action, $middleware);
    }

    public static function options(string $uri, string|callable $action, $middleware = [])
    {
        self::add('options', $uri, $action, $middleware);
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}
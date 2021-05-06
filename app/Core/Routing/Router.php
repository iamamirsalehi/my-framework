<?php


namespace App\Core\Routing;


use App\Core\Request;

class Router
{
    private $request;

    private $routes;

    private $current_route;

    public function __construct()
    {
        $this->request = new Request();

        $this->routes = Route::getRoutes();

        $this->current_route = $this->findCurrentRoute($this->request);
    }

    public function findCurrentRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $request->uri() and in_array($request->method(), $route['methods'])) {
                return $route;
            }else{
                die('404');
            }
        }

        return null;
    }

}
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

    private function findCurrentRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $request->uri() and in_array($request->method(), $route['methods'])) {
                return $route;
            }
        }

        return null;
    }

    public function run()
    {

    }

    private function dispatch405()
    {
        header("HTTP/1.0 404 Not Found");
        echo "PHP continues.\n";
        die();
    }

    private function dispatch404()
    {

    }

}
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
        if (is_null($this->current_route))
            $this->dispatch404();


        $this->dispatch();
    }

    private function dispatch()
    {
        if (is_null($this->current_route['action']))
            return;

        if (is_callable($this->current_route['action']))
            call_user_func($this->current_route['action']);

        if (is_string($this->current_route['action']))
            $this->runActionAsString();

        if (is_array($this->current_route['action']))
            $this->runActionAsArray();
    }

    private function dispatch405()
    {
        header("HTTP/1.0 405 Method Not Allowed");
        view('errors.405');
        die();
    }


    private function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        view('errors.404');
        die();
    }

    private function runActionAsArray()
    {

    }

    private function runActionAsString()
    {
        $action = explode('@', $this->current_route['action']);

        $method = $action[1];

        $class_name = config('app.base_controllers_namespace') . $action[0];

        if(!class_exists($class_name))
            throw new \Exception('Class '. $class_name .' does not exist');

        $class = new $class_name;

        if(!method_exists($class, $method))
            throw new \Exception('Method '. $method .' in '. $class_name .' does not exist');

        $class->{$method}();
    }
}
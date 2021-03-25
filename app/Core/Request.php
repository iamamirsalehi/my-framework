<?php

namespace App\Core;


class Request
{
    private $ip;

    private $params;
    
    private $agent;

    private $method;
    
    public function __construct()
    {
        $this->params = $_REQUEST;

        $this->agent  = $_SERVER['HTTP_USER_AGENT'];

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->ip     = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Get the sent request method
     *
     * @return string
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * Get the sent request parameters
     *
     * @return array
     */
    public function params()
    {
        return $this->params;
    }

    /**
     * Get the sent request user ip
     *
     * @return string
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * Get the sent request user browser data
     *
     * @return string
     */
    public function agent()
    {
        return $this->agent;
    }


    /**
     * Get the specific value of parameters
     * 
     * @return string
     */
    public function input($key)
    {
        if(array_key_exists($key, $this->params))
            return $this->params[$key];
        return null;
    }

    /**
     * Get the specific parameter without calling input method
     *
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
        return $this->input($name);
    }
}
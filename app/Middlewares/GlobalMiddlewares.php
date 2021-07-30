<?php


namespace App\Middlewares;


class GlobalMiddlewares
{
    protected array $middlewares = [
        BlockIEMiddleware::class,
        TestMiddleware::class,
    ];

    public function getGLobalMiddlewares()
    {
        return $this->middlewares;
    }
}
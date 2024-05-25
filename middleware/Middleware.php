<?php


class Middleware
{
    const MAP = 
    [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
        if(!$key) {
            return;
        }
        $middleware = static::MAP[$key];

        if(!$middleware)
        {
            throw new BadFunctionCallException('No matching middleware found');
        }

        (new $middleware)->handle(); 
    }
}
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'ValidUser' => \App\Http\Middleware\ValidUser::class,
            'NonValidUser' => \App\Http\Middleware\NonValidUser::class,
            'isSeller' => \App\Http\Middleware\isSeller::class,
            'isCustomer' => \App\Http\Middleware\isCustomer::class,
            'Checkout' => \App\Http\Middleware\Checkout::class,
            'isAdmin'=>\App\Http\Middleware\isAdmin::class,

    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

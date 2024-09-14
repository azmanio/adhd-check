<?php

use App\Http\Middleware\ForceToHTTPS;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => IsAdmin::class,
        ]);
        $middleware->redirectGuestsTo(fn(Request $request) => route('login'));
        $middleware->append(ForceToHTTPS::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
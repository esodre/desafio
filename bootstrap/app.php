<?php

use App\Http\Middleware\AlwaysAcceptJson;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->prependToGroup('api', AlwaysAcceptJson::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(
            fn (NotFoundHttpException $e) => response()->json(['message' => 'Object Not Found'], 404)
        );
    })->create();

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
        ]);
        $middleware->validateCsrfTokens(
            except: ['/*']
        );
        $middleware->append(\App\Http\Middleware\CorsMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (AuthenticationException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 401,
            ]);

            return $response;
        });

        $exceptions->renderable(function (AuthorizationException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 401,
            ]);

            return $response;
        });  
        
        $exceptions->renderable(function (TokenMismatchException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 401,
            ]);

            return $response;
        });  

        $exceptions->renderable(function (ValidationException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 422,
            ]);

            return $response;
        });
        
        $exceptions->renderable(function (ModelNotFoundException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 422,
            ]);

            return $response;
        });

        $exceptions->renderable(function (HttpException $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 404,
            ]);

            return $response;
        });

        $exceptions->renderable(function (Exception $exception) {
            $response = response()->json([
                'message' => $exception->getMessage(),
                'code' => 500,
            ]);

            return $response;
        });
    })->create();

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $e) {
            // Log the error message, file, and line number
            Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            
            // Handle Validation Exception
            if ($e instanceof ValidationException) {
                $errors = $e->errors();
                
                return response()->json([
                    'message' => 'Validation Failed',
                    'errors' => $errors,
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }else {
                // Handle Other Exceptions
                return response()->json([
                    'message' => $e->getMessage(),
                    'status' => $e->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR
                ], $e->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        });

        $exceptions->render(function (TypeError $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'status' => $e->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR
            ], $e->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR);
        });

    })->create();

<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message, $data = [], $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $statusCode
        ], $statusCode);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param array $errors
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $errors = [], $statusCode = 500)
    {
        return response()->json([
            'message' => $message,
            isset($errors) ?: 'errors' => $errors,
            'status' => $statusCode
        ], $statusCode);
    }
}

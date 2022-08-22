<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponserTrait
{
    protected function successResponse(array $data, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'statuscode' => $code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }

    protected function errorResponse(array $data, int $code, string $message = null): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'statuscode' => $code,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
}

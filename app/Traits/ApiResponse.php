<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function success($message = 'Success', $code = 200, $data = null): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function error($message = 'Error', $code = 500, $data = null): JsonResponse
    {
        $code = (int) $code === 42703 ? 500 : $code;

        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $data,
        ], $code > 0 ? $code : 500);
    }
}

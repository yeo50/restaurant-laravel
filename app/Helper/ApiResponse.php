<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

function jsonSuccess($data = null, string $message = 'Success', int $statusCode = 200): JsonResponse
{
    return response()->json([
        'success' => true,
        'data' => $data,
        'message' => $message,
        'status' => $statusCode
    ], $statusCode);
}

function jsonError(string $message = 'Error', int $statusCode = 500): JsonResponse
{
    return response()->json([
        'success' => false,
        'message' => $message,
        'status' => $statusCode
    ], $statusCode);
}

<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponses
{
    protected function ok($message, $data = []): JsonResponse
    {
        return $this->success($message, $data);
    }

    protected function success($message, $data, $status_code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'statusCode' => $status_code
        ], $status_code);
    }

    protected function error($message, $status_code): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $status_code);
    }
}

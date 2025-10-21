<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponses
{
    protected function ok($message): JsonResponse
    {
        return $this->success(['message' => $message, 'status' => Response::HTTP_OK]);
    }

    protected function success($message, $status_code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['data' => $message], $status_code);
    }
}

<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponses
{
    protected function ok($message): JsonResponse
    {
        return $this->success($message);
    }

    protected function success($message, $status_code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(['message' => $message], $status_code);
    }
}

<?php

namespace App\Traits\Api\V1;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    protected function successResponse(
        $data = null,
        ?string $message = null,
        int $code = 200,
        $extra_data = null
    ): JsonResponse
    {
        $responseData = [
            'status' => 'Success',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ];

        if ($extra_data) {
            $responseData = array_merge($responseData, $extra_data);
        }

        return response()->json
        ($responseData)
            ->setStatusCode($code);
    }

    protected function errorResponse(
        int     $code,
        ?string $message = null,
                $data = null
    ): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ])->setStatusCode($code);
    }
}

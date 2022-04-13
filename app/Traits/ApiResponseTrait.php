<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function errorResponse($message, $status, $code = null)
    {
        $code = $code ?? $status;

        return response()->json(
            [
                'message' => $message,
                'code' => $code
            ],
            $status

        );
    }
}

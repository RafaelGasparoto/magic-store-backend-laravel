<?php

namespace App\utils;

use Illuminate\Http\JsonResponse;

class Erro
{
    public static function tratar(string $mensagem, int $status = 400): JsonResponse
    {
        if ($status < 100 || $status > 599) {
            $status = 400;
        }

        return response()->json([
            'status' => $status,
            'erro' => $mensagem,
        ], $status);
    }
}

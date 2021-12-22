<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function success($data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function error($data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => false,
            'data' => []
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use function response;

final class JsonpAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $response = Response::jsonp('callback', ['status' => 'success']);
        // 헬퍼 함수를 이용하는 경우
        $response = response()->jsonp('callback', ['status' => 'success']);
        return $response;
    }
}

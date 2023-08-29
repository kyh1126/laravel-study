<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;
use function response;

class TextAction extends Controller
{
    public function __invoke(Request $request): IlluminateResponse
    {
        $response = Response::make('hello world', headers: [
            'content-type' => 'text/plain'
        ]);
        // 헬퍼 함수를 이용하는 경우
        $response = response('hello world');
        // content-type을 변경
        $response = response(
            'hello world',
            IlluminateResponse::HTTP_OK,
            [
                'content-type' => 'text/plain'
            ]
        );
        return $response;
    }
}

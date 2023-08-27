<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

final class UserController extends Controller
{
    public function register(Request $request)
    {
        // 다음 규칙을 배열로 지정
        // name은 필수, 최대 20문자
        // email은 필수, 메일 주소 규칙을만족하며 최대 255문자
        $rules = [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
        ];

        // 1. 밸리데이션 실행
        // 에러 발생 시 직전 화면으로 리다이렉트
        $this->validate($request, $rules);

        // 밸리데이션 통과 후 실행할 처리
        $name = $request->get('name');
    }
}

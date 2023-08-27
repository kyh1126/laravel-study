<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

final class UserController extends Controller
{
    public function register(Request $request)
    {
        // 다음 규칙을 배열로 지정
        // name은 필수, 최대 20문자
        // email은 필수, 메일 주소 규칙을 만족하며 최대 255문자
        $rules = [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
        ];

        // 모든 입력값을 얻어 $inputs에 저장
        $inputs = $request->all();

        // 밸리데이터 클래스의 인스턴스 생성
        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) {
            // 밸리데이션 에러 발생시 처리 내용
            Log::debug("failed");
        }

        // 밸리데이션 통과 후 처리 기술
        $name = $request->get('name');
    }
}

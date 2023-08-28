<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

final class UserController extends Controller
{
    public function register(Request $request)
    {
        // 'name'의 밸리데이션 규칙에 'ascii_alpha' 추가
        $rules = [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
        ];

        $inputs = $request->all();

        $validator = Validator::make($inputs, $rules);
        $validator->sometimes(
            'age',
            'integer|min:18',
            function ($inputs) {
                return $inputs->mailmagazine === 'allow';
            }
        );

        if ($validator->fails()) {
            // 밸리데이션 에러 시 처리
        }

        // 밸리데이션 통과 후 처리
        $name = $request->get('name');
    }
}

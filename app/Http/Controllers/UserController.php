<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistPost;

final class UserController extends Controller
{
    public function register(UserRegistPost $request)
    {
        // 여기에 도달할 때까지 밸리데이션 판정을 수행한다

        // 밸리데이션 통과 후의 처리
        $name = $request->get('name');
    }
}

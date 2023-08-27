<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\UserPurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

final class UserController extends Controller
{
    protected $service;

    public function __construct(UserPurchaseService $service)
    {
        $this->service = $service;
    }

    public function index(string $id)
    {
        $result = $this->service->retrievePurchase(intval($id));
        return view('user.index', ['user' => $result]);
    }

    public function register(Request $request)
    {
        // 모든 입력값을 얻어 $inputs에 저장한다
        $inputs = $request->all();

        // 밸리데이션 규칙 정의
        // name 키 값은 필수, age는 정숫값
        $rules = [
            'name' => 'required',
            'age' => 'integer',
        ];

        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) {
            // 값이 에러인 경우의 처리
        }
        // 값이 정상인 경우의 처리
    }
}

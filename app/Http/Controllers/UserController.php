<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Purchase;

final class UserController extends Controller
{
    public function index(string $id)
    {
        $user = User::find(intval($id));
        $purchase = Purchase::findAllBy($user->id);
        // 데이터베이스로부터 얻은 값을 사용한 처리 등

        return view('user.index', ['user' => $user]);
    }
}

<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\User;
use App\Purchase;

class UserPurchaseService
{
    public function retrievePurchase(int $identifier): User
    {
        $user = User::find($identifier);
        $user->purchase = Purchase::findAllBy($user->id);
        // 데이터베이스로부터 얻은 값을 사용한 처리 등

        return $user;
    }
}

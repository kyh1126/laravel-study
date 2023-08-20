<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function find(int $id): array
    {
        $user = User::find($id)->toArray();
        // 사용자 정보 추출 등의 처리
        return $user;
    }
}

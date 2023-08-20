<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\User;
use App\Repository\UserRepositoryInterface;

class UserPurchaseService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function retrievePurchase(int $identifier): User
    {
        // 저장소를 통한 데이터 취득
        $user = $this->userRepository->find($identifier);
        // 데이터베이스로부터 얻은 값을 사용한 처리 등
        return new User($user);
    }
}

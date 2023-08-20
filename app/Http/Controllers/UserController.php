<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\UserPurchaseService;

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
}

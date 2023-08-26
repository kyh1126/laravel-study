<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistPost;
use App\Service\UserPurchaseService;
use Illuminate\Support\Facades\Log;

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

    public function register(UserRegistPost $request)
    {
        Log::debug('register request is coming!');
        $name = $request->get('name');
        $age = $request->get('age');
    }
}

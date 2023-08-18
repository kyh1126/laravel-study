<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

final class UserController extends Controller
{
    public function detail(string $id): View
    {
        return view('user.detail');
    }

    public function userDetail(string $id): Response
    {
        return new Response(view('user.detail'), Response::HTTP_OK);
    }

    public function index(Request $request): ViewFactory
    {
        // 1
        $user = User::find($request->get('id'));
        // 2
        return view('user.index', [
            'user' => $user,
        ]);
    }

    // 3
    public function store(Request $request): RedirectResponse
    {
        // 등록 처리 등
        return new RedirectResponse();
    }
}

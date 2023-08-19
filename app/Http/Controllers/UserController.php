<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Service\BookReviewService;
use App\Service\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    private $userService;
    private $bookReviewService;
    // 1
    public function __construct(
        UserService       $userService,
        BookReviewService $bookReviewService
    )
    {
        $this->userService = $userService;
        $this->bookReviewService = $bookReviewService;
    }

    public function index(Request $request): View
    {
        return view('user.index', [
            'user' => $this->userService->retrieveUser($request->get('id'))
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->userService->activate(
            $request->get('user_id'),
            $request->get('user_name')
        );
        // 2
        $this->bookReviewService->addReview(
            $request->get('user_id'),
            $request->get('book_id'),
            $request->get('review')
        );
        // 응답 반환 처리
        return redirect('/users');
    }
}

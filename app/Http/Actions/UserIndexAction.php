<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Service\UserService;
use App\Http\Responder\UserResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

final class UserIndexAction extends Controller
{
    private $domain;
    private $userResponder;

    // 1
    public function __construct(
        UserService $userService,
        UserResponder $userResponder
    ) {
        $this->domain = $userService;
        $this->userResponder = $userResponder;
    }

    // 2
    public function __invoke(Request $request): Response
    {
        return $this->userResponder->response(
            $this->domain->retrieveUser($request->get('id'))
        );
    }
}

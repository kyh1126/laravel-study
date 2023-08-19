<?php

declare(strict_types=1);

namespace App\Http\Responder;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Models\User as UserModel;

class UserResponder
{
    protected $response;
    protected $view;

    public function __construct(Response $response, ViewFactory $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

//    public function response(UserModel $user): Response
//    {
//        if (!$user->id) {
//            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
//        }
//        $this->response->setContent(
//            $this->view->make('user.index', ['user' => $user])
//        );
//        return $this->response;
//    }
    public function response(UserModel $user): Response
    {
        $statusCode = Response::HTTP_OK;
        if (!$user->id) {
            $statusCode = Response::HTTP_NOT_FOUND;
        }
        // Illuminate/Foundation/helpers.php의 response 메서드 활용
        return response(view('user.index', ['user' => $user]), $statusCode);
    }
}

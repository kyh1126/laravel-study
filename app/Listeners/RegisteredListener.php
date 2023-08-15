<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Mailer;
use App\Models\User;

class RegisteredListener
{
    private $mailer;    // 추가한다
    private $eloquent;  // 추가한다

    /**
     * Create the event listener.
     */
    public function __construct(Mailer $mailer, User $eloquent) // 수정한다
    {
        $this->mailer = $mailer;
        $this->eloquent = $eloquent;
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier());
        $this->mailer->raw(
            '회원 등록을 완료했습니다',
            function ($message) use ($user) {
                $message->subject('회원 등록 메일')->to($user->email);
            }
        );
    }
}

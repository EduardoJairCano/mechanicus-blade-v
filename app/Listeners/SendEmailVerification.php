<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event): void
    {
        $user = User::findOrFail($event->userId);

        if ($user) {
            Mail::send('emails.users.register', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email)->subject('Usuario registrado exitosamente');
            });
        }
    }
}

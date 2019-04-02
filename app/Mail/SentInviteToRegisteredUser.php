<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentInviteToRegisteredUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $fullname;
    private $token;

    public function __construct(User $user, $token)
    {
        $this->fullname = $user->profile->fullname();
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.invites.invite-register-user-to-team')->subject('You have been invited')->with([
            'fullname' => $this->fullname,
            'token' => $this->token
        ]);
    }
}

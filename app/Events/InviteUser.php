<?php

namespace App\Events;


use App\Mail\SentInviteToRegisteredUser;
use App\Mail\SentInviteToUnRegisteredUser;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InviteUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    private $email;
    private $token;

    public function __construct($email)
    {
        $this->email = $email;
        $this->token =  Hash::make($this->email . time());
        if ($user = $this->isUserRegistered($email)) {
            $this->sendInviteToRegisteredUser($user);
            $user_id = $user->id;
        } else {
            $this->sendInviteToUnRegisteredUser();
            $user_id = NULL;
        }

        Invite::updateOrCreate([
            'user_id'=>$user_id,
            'team_id'=>auth()->user()->own_team->id,
            'email'=>$this->email
        ],[
            'user_id'=>$user_id,
            'team_id'=>auth()->user()->own_team->id,
            'token'=>$this->token,
            'email'=>$this->email
        ]);

        Session::flash('success',__('Invite has been sent'));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    protected function isUserRegistered()
    {
        if ($user = User::where('email', '=', $this->email)->first()) {
            return $user;
        }
        return false;
    }

    public function sendInviteToRegisteredUser(User $user)
    {
        Mail::to($user->email)->send(new SentInviteToRegisteredUser($user, $this->token));
    }


    public function sendInviteToUnRegisteredUser()
    {
        Mail::to($this->email)->send(new SentInviteToUnRegisteredUser($this->email, $this->token));
    }
}

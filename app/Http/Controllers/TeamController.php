<?php

namespace App\Http\Controllers;

use App\Events\InviteUser;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Auth::user()->teams;
        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        $users = $team->users;
        $myTeam = false;
        if ($team->id == Auth::user()->own_team->id) {
            $myTeam = true;
        }
        return view('teams.show', compact('team', 'users', 'myTeam'));
    }

    public function invite()
    {
        return view('teams.invite');
    }

    public function sendInvite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        event(new InviteUser($request->email));
        
        return redirect()->back();

    }

    public function removeUser()
    {

    }

    public function leaveTeam()
    {

    }


}

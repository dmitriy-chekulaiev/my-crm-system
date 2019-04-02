<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my()
    {
        $profile = Auth::user()->profile;
        return view('my-profile.profile', compact('profile'));
    }

    public function show(Profile $profile)
    {
        if (Auth::user()->profile->id == $profile->id) {
            return view('my-profile.profile', compact('profile'));
        } else {
            return view('profiles.show', compact('profile'));
        }
    }

    public function update(Request $request, Profile $profile)
    {
        $profile = auth()->user()->profile;

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'gender' => 'required|in:not_defined,male,female,alien',
        ]);

        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->gender = $request->gender;

        if ($request->profile_image) {
            $profile->profile_image = $request->file('profile_image');
        }

        if ($profile->save()) {
            Session::flash('success', __('Profile updated success!'));
            return redirect()->back();
        }
    }
}

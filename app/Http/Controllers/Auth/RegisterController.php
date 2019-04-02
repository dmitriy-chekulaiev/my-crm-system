<?php

namespace App\Http\Controllers\Auth;

use App\Models\Team;
use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' => ['required', 'string', 'in:developer,designer,project_manager,qa'],
            'gender' => ['string', 'in:male,female,alien,not_defined'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {

            $profile = Profile::create([
                'user_id' => $user->id,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'position' => $data['position'],
                'gender' => $data['gender'],
            ]);

            $user->roles()->attach('2');

            if ($profile) {

                $team = Team::create([
                    'owner_id' => $user->id,
                    'name' => $data['firstname'] . ' ' . $data['lastname'] . "'s " . 'Team',
                ]);

                if ($team) {

                    $user->teams()->attach($team->id);
                    return $user;

                }

            } else {
                User::destroy($user->id);
            }
        }

    }

    protected function update(array $data)
    {
        $user = User::update([
            'id' => Auth::user()->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {

            $profile = Profile::update([
                'id' => Auth::user()->profile,
                'user_id' => $user->id,
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'position' => $data['position'],
                'gender' => $data['gender'],
            ]);

            $user->roles()->attach('2');

            if ($profile) {

                return $user;

            } else {
                User::destroy($user->id);
            }
        }

    }

}

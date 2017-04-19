<?php

namespace App\Http\Controllers\Auth;

use App\Association;
use App\Role;
use App\Status;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function showRegistrationForm()
    {
        return view('auth.register', ['Status' => Status::get(), 'Association' => Association::get()]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'forename' => 'required|string',
            'status' => 'required|string',
            'birthday' => 'required|date',
            'association' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
            return User::create([
                'name' => $data['name'],
                'forename' => $data['forename'],
                'avatar' => "images/avatar/default-avatar.png",
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'status_id' => Status::where('name', $data['status'])->first()->id,
                'role_id' => Role::where('name', 'student')->first()->id,
                'association_id' => Association::where('name', $data['association'])->first()->id,
                'birthday' => $data['birthday'],
                'is_valid' => false,
            ]);
    }
}

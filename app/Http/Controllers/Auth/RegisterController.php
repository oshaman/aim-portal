<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendVerificationEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
            'email_token' => str_random(64),
        ]);

        $user->generatePassword($data['password']);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return view('auth.verify');
    }

    public function verify($token, Request $request)
    {
        $user = User::where('email_token', $token)->first();
        if (!$user) {
            return redirect()->route('resend_activation')->withErrors(['wrong' => 'wrong_token']);
        }

        if (1 == $user->verified) {
            $request->session()->flash('status', 'You are already confirmed');
            return view('auth.emailconfirm');
        }
        $user->verified = 1;
        if ($user->save()) {
            $request->session()->flash('status', 'Confirmed');
            $this->guard()->login($user);
            return view('auth.emailconfirm', ['status' => 'confirm']);
        }
    }
}

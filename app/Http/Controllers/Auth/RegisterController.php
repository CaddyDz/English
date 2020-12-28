<?php

namespace English\Http\Controllers\Auth;

use DB;
use English\Http\Controllers\Controller;
use English\Models\User;
use English\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest');
        $this->service = $userService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (!isset($data['terms_and_conditions'])) {
            $data['terms_and_conditions'] = false;
        }

        return Validator::make($data, [
            'username'             => 'bail|required|max:50|min:3|unique:users,name',
            'email'                => 'bail|required|email|max:255|unique:users',
            'password'             => 'bail|required|min:6|max:255|confirmed',
            'terms_and_conditions' => 'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name'     => $data['username'],
                'email'    => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            return $this->service->create($user, $data['password']);
        });
    }
}

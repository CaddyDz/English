<?php

namespace English\Http\Controllers\Auth;

use English\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
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
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Check user's role and redirect user based on their role.
     *
     * @return
     */
    public function authenticated()
    {
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
        'login'    => 'required',
        'password' => 'required',
    ]);
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
        ? 'email'
        : 'name';
        $request->merge([
        $login_type => $request->input('login'),
    ]);
        if (\Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()
        ->withInput()
        ->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }
}

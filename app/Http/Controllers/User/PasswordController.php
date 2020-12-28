<?php

namespace English\Http\Controllers\User;

use Auth;
use English\Http\Controllers\Controller;
use English\Http\Requests\PasswordUpdateRequest;
use English\Services\UserService;
use Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectPath = '/user/password';

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * User wants to change their password.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return view('user.password')
            ->with('user', $user);
        }

        return back()->withErrors(['Could not find user']);
    }

    /**
     * Change the user's password and return.
     *
     * @param PasswordUpdateRequest $request
     *
     * @return Response
     */
    public function update(PasswordUpdateRequest $request)
    {
        $password = $request->new_password;

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $this->resetPassword(Auth::user(), $password);

            return redirect('user/settings')
                ->with('message', 'Password updated successfully');
        }

        return back()->withErrors(['Password could not be updated']);
    }
}

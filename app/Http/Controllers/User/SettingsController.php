<?php

namespace English\Http\Controllers\User;

use English\Http\Controllers\Controller;
use English\Http\Requests\UserUpdateRequest;
use English\Services\UserService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * View current user's settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return view('user.settings')
            ->with('user', $user);
        }

        return back()->withErrors(['Could not find user']);
    }

    /**
     * Update the user.
     *
     * @param UpdateAccountRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        if ($this->service->update(auth()->id(), $request->all())) {
            return back()->with('message', 'Settings updated successfully');
        }

        return back()->withErrors(['Could not update user']);
    }
}

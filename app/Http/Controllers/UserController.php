<?php

namespace English\Http\Controllers;

use Auth;
use English\Models\User;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('name', $username)->first();
        if (!$user) {
            abort(404);
        }
        $statuses = $user->statuses()->get();
        // Return view with profile owner and his statuses and friends
        if (Auth::user() == $user) {
            return view('user.settings')->with('user', $user);
        } else {
            return view('user.index')->with('user', $user)->with('statuses', $statuses);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $messages = [
            'password_hash_check' => 'Old password incorrect',
        ];
        // Validate input data
        $hashed_password = Auth::user()->password;
        // FIXME: Validation not working
        /*
        $this->validate($request, [
            'name' => 'bail|required|alpha|min:4|max:50|unique:users',
            'firstName' => 'min:3|max:10|alpha',
            'lastName' => 'min:3|max:15|alpha',
            'location' => 'min:4|max:30',
            'oldPassword' => "password_hash_check:$hashed_password|string|min:6",
            'password' => 'required_with:oldPassword|confirmed|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $messages);
        */
        Auth::user()->update([
            // Update the data in DB
            'name' => $request->input('name'),

            'password' => bcrypt($request->input('password')),

        ]);
        Auth::user()->meta()->update([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'location'   => $request->input('location'),
            'avatar'     => $request->file('avatar'),
        ]);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time().Auth::user()->id.random_int(0, time());
            $extension = '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/img/avatars/'.$filename.$extension));
            Image::make($avatar)->resize(30, 30)->save(public_path('/img/avatars/30x30/'.$filename.$extension));
            Image::make($avatar)->resize(35, 35)->save(public_path('/img/avatars/35x35/'.$filename.$extension));
            Image::make($avatar)->resize(39, 39)->save(public_path('/img/avatars/39x39/'.$filename.$extension));
            Auth::user()->meta->avatar = $filename.$extension;
            Auth::user()->meta->save();
        }

        return redirect()->route('users.show', ['username' => Auth::user()->name])
                       ->with('info', 'Your profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

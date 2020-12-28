<?php

namespace English\Http\Controllers;

use DB;
use English\Models\User;
use English\Models\UserMeta;

class SearchController extends Controller
{
    public function getResults()
    {
        $query = request('query');
        if (!$query) {
            return redirect()->route('home');
        }
        $users = User::where('name', 'LIKE', "%{$query}%")->get();
        $merged = $users->merge(UserMeta::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', "%{$query}%")->get());

        return view('search.results')->with('users', $merged);
    }
}

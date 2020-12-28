<?php

namespace English\Http\Controllers;

class PagesController extends Controller
{
    /**
     * Homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if (!\Auth::check()) {
            return view('welcome');
        } else {
            $statuses = \English\Models\Status::get();

            return view('index', compact('statuses'));
        }
    }

    /**
     * Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard.main');
    }
}

<?php

namespace English\Http\Controllers\Admin;

use English\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function group_dashboard()
    {
        return view('group-dashboard');
    }

    public function company_dashboard()
    {
        return view('company-dashboard');
    }

    public function print_overall()
    {
        return view('print-overall');
    }
}

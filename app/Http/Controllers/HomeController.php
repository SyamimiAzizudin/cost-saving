<?php

namespace App\Http\Controllers;

use App\Company;
// use App\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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
        $companies = Company::all();
        return view('group-dashboard', compact('companies'));
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

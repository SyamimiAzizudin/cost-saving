<?php

namespace App\Http\Controllers;

use App\Company;
use App\Initiative;
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
        // $companies = Company::pluck('group','id')->first();
        // $companies = Company::where('company_id', $request->company_id)->where('group', $request->group)->first();
        $companies = Company::all();
        return view('dashboard', compact('companies'));
    }

    public function group_dashboard()
    {
        $companies = Company::all();
        return view('group-dashboard', compact('companies'));
    }

    public function company_dashboard($id)
    {
        $init = Initiative::all();
        // $companies = Company::all();
        $company = Company::findOrFail($id);

        return view('company-dashboard', compact('init','company'));
    }

    public function print_overall()
    {
        return view('print-overall');
    }

    public function init($id)
    {
        $company = Company::findOrFail($id);
        return view('saving/saving-company', compact('company'));
    }
}

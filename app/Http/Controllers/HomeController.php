<?php

namespace App\Http\Controllers;

use App\Company;
use App\Initiative;
use App\Saving;
use Carbon\Carbon;
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
        #$companies = Company::all();
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;
        //todo only query for that year
        $yearly_target = Saving::sum('target_saving');
        $cummulative_target = Saving::where('month', '<=',$current_month)->sum('target_saving');
        $cummulative_actual = Saving::where('month', '<=',$current_month)->sum('actual_saving');

        #dd($current_year);
        $companies = Company::select('group')->distinct()->get();
        #dd($companies);
        return view('dashboard', compact('companies', 'yearly_target', 'cummulative_target', 'cummulative_actual'));
    }

    public function group_dashboard($group)
    {
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;

       /* $initiatives_id = Initiative::with([
            'initiatives.companies' => function($query)use($group){
                $query->where('group',$group);
            }
        ])->toSql();

        dd($initiatives_id);*/
        //todo only query for that year
        $yearly_target = Saving::with([
            'initiatives.companies' => function($query)use($group){
                $query->where('group',$group);
            }
        ])
        ->sum('target_saving');
        $cummulative_target = Saving::where('month', '<=',$current_month)
            ->with([
                'initiatives.companies' => function($query)use($group){
                    $query->where('group',$group);
                }
            ])
            ->sum('target_saving');

        $cummulative_actual = Saving::where('month', '<=',$current_month)
            ->with([
                'initiatives.companies' => function($query)use($group){
                    $query->where('group',$group);
                }
            ])
            ->sum('actual_saving');

        $companies = Company::with([
            'initiatives.savings' => function($query){
                $query->where('month', Carbon::now()->month);
                $query->orderBy('month');
            }
        ])
        ->where('group', $group)
        ->get();

        foreach ($companies as $k => $v)
        {
            $result = DB::table('savings')
                ->join('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
                ->join('companies', 'companies.id', '=', 'initiatives.company_id')
                ->select( 'savings.actual_saving', 'savings.target_saving')
                ->where('companies.id', $v->id)
                ->where('savings.month', 4)
                ->first();
            #dump($result);
            $companies[$k]->target_saving = null;
            $companies[$k]->actual_saving = null;
            if(isset($result->target_saving)) {
                $companies[$k]->target_saving = $result->target_saving;

            }

            if(isset($result->actual_saving)) {
                $companies[$k]->actual_saving = $result->actual_saving;

            }

        }

        #dd($companies);

        return view('group-dashboard', compact('companies','group','yearly_target', 'cummulative_target', 'cummulative_actual'));
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

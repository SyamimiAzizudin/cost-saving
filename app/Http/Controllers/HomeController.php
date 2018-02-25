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

        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;
        //todo only query for that year
        $yearly_target = Saving::sum('target_saving');
        $cummulative_target = Saving::where('month', '<=',$current_month)->sum('target_saving');
        $cummulative_actual = Saving::where('month', '<=',$current_month)->sum('actual_saving');

        #dd($current_year);
        $companies = Company::select('group')->distinct()->get();

        //todo filter by year
        $saving_summary_sql = 'select  `companies`.`group`, sum(`savings`.`actual_saving`) as actual, sum(`savings`.`target_saving` ) as target
        from `savings` 
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id` 
        where savings.`month` = 4
        group by `companies`.`group`';

        $saving_summary_results = DB::select($saving_summary_sql);
        #dump($saving_summary_results);

        $target_sql = 'select `month`,sum(target_saving) as target_saving
        from savings
        group by `month`,`year`';
        $targets = DB::select($target_sql);

        $actual_sql = 'select `month`,sum(actual_saving) as actual_saving
        from savings
        group by `month`,`year`';
        $actual = DB::select($actual_sql);

        $yearly_target_sql = 'select `month`, (select sum(target_saving) from savings) as yearly_target
        from savings
        group by `month`,`year`';
        $yearly_target_results = DB::select($yearly_target_sql);

        $graphs = [];
        $graphs['targets'] = [];
        $initial_value_target = 0;
        foreach($targets as $k => $v)
        {
            $result = $initial_value_target +=$v->target_saving;
            array_push($graphs['targets'], $result);
        }

        $graphs['actual'] = [];
        $actual_value_target = 0;
        foreach($actual as $k => $v)
        {
            $result = $actual_value_target +=$v->actual_saving;
            array_push($graphs['actual'], $result);
        }

        $graphs['yearly_target'] = [];
        foreach($yearly_target_results as $k => $v)
        {
            array_push($graphs['yearly_target'], (int)$v->yearly_target);
        }
        #dd($graphs);
        return view('dashboard', compact('companies', 'yearly_target', 'cummulative_target', 'cummulative_actual', 'saving_summary_results','graphs'));
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

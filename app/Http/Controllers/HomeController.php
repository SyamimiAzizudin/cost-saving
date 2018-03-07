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
        $ls = DB::table('savings')
            ->orderBy('updated_at', 'desc')
            ->get();
        $last_update = $ls->first()->updated_at;

        //todo 5 big numbers query for that year
        $yearly_target = Saving::sum('target_saving');
        $cummulative_target = Saving::where('month', '<=',$current_month)->sum('target_saving');
        $cummulative_actual = Saving::where('month', '<=',$current_month)->sum('actual_saving');

        $companies = Company::select('group')->distinct()->get();

        //todo graph query for main dashboard    
        $targets = DB::select('select `month`,sum(target_saving) as target_saving
        from savings
        group by `month`');

        $actual = DB::select('select `month`,sum(actual_saving) as actual_saving
        from savings
        where `month` between 1 and :month
        group by `month`', ['month' => $current_month]);

        $yearly_target_results = DB::select('select `month`, (select sum(target_saving) from savings) as yearly_target
        from savings
        group by `month`');

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

        return view('dashboard', compact('last_update', 'companies', 'yearly_target', 'cummulative_target', 'cummulative_actual', 'saving_summary_results', 'graphs'));
    }

    public function dashboard_cost_saving_summary($month)
    {

        //todo filter cost saving summary by year
        $saving_summary_sql = 'select  `companies`.`group`, sum(`savings`.`actual_saving`) as actual, sum(`savings`.`target_saving` ) as target
        from `savings` 
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id` 
        where savings.`month` = '.$month.'
        group by `companies`.`group`';

        $saving_summary_results = DB::select($saving_summary_sql);

        $data['saving_summary_results'] = $saving_summary_results;
        return view('dashboard_cost_saving_summary', $data);
    }

    public function group_dashboard($group)
    {
        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;
        $ls = DB::table('savings')
            ->join('initiatives', 'initiatives.id', '=', 'savings.initiative_id')
            ->join('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.updated_at')
            ->where([
                ['group', $group],
                // ['month', '<=' , $current_month],
                ])
            ->orderBy('savings.updated_at', 'desc')
            ->get();
        $last_update = $ls->first()->updated_at;

        //todo 5 big numbers query for that year
        $yearly_target = DB::table('savings')
            ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
            ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.target_saving')
            ->where('group', $group)
            ->sum('target_saving');

        $cummulative_target = DB::table('savings')
            ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
            ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.target_saving','month')
            ->where([
                ['group', $group],
                ['month', '<=' , $current_month],
                ])
            ->sum('target_saving');

        $cummulative_actual = DB::table('savings')
            ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
            ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.actual_saving','month')
            ->where([
                ['group', $group],
                ['month', '<=' , $current_month],
                ])
            ->sum('actual_saving');

        //todo graph query for group dashboard    
        $targets = DB::select('select `month`,
            sum(`savings`.`target_saving`) as target_saving
        from `savings`
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id`
        where `companies`.`group` = :group
        group by `month`', ['group' => $group]);

        $actual = DB::select('select `month`,
            sum(`savings`.`actual_saving`) as actual_saving
        from `savings`
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id`
        where `companies`.`group` = :group and `month` between 1 and :month
        group by `month`', ['group' => $group, 'month' => $current_month]);

        $yearly_target_results = DB::select('select `month`, 
            (select sum(target_saving) from savings
        inner join initiatives on savings.initiative_id = initiatives.id
        inner join companies on companies.id = initiatives.company_id
        where companies.group = :group) as yearly_target
        from `savings`  
        group by `month`', ['group'=> $group]);

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

        return view('group-dashboard', compact('last_update', 'group','yearly_target', 'cummulative_target', 'cummulative_actual', 'graphs'));
    }

    public function group_dashboard_cost_saving_summary($group, $month)
    {
        //todo filter cost saving summary by year
        $url = htmlspecialchars_decode($group);
        // dd($url);
        $current_month = Carbon::now()->month;
/*        $cummulative_target = Saving::where('month', '<=',$current_month)
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
            ->sum('actual_saving');*/

        $companies = Company::with([
            'initiatives.savings' => function($query){
                $query->where('month', Carbon::now()->month);
                $query->orderBy('month');
            }
        ])
        ->where('group', $url)
        ->get();

        foreach ($companies as $k => $v)
        {
            $result_target_saving = DB::table('savings')
                ->join('initiatives', 'initiatives.id', '=', 'savings.initiative_id')
                ->join('companies', 'companies.id', '=', 'initiatives.company_id')
                ->where('companies.id', $v->id)
                ->where('savings.month', $month)
                ->sum('savings.target_saving');

            $result_actual_saving = DB::table('savings')
                ->join('initiatives', 'initiatives.id', '=', 'savings.initiative_id')
                ->join('companies', 'companies.id', '=', 'initiatives.company_id')
                ->where('companies.id', $v->id)
                ->where('savings.month', $month)
                ->sum('savings.actual_saving');
                // dd($result);

            $companies[$k]->target_saving = null;
            $companies[$k]->actual_saving = null;
            if(isset($result_target_saving)) {
                $companies[$k]->target_saving = $result_target_saving;

            }

            if(isset($result_actual_saving)) {
                $companies[$k]->actual_saving = $result_actual_saving;

            }

        }
        $data['companies'] = $companies;

        return view('group_dashboard_cost_saving_summary', compact('companies','group', 'cummulative_target', 'cummulative_actual'));
    }
    
    public function company_dashboard($id)
    {
        $company = Company::findOrFail($id);

        $current_year = Carbon::now()->year;
        $current_month = Carbon::now()->month;
        $ls = DB::table('savings')
            ->join('initiatives', 'initiatives.id', '=', 'savings.initiative_id')
            ->join('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.updated_at')
            ->where([
                ['companies.id', $id],
                ])
            ->orderBy('savings.updated_at', 'desc')
            ->get();
        $last_update = $ls->first()->updated_at;

        //todo 5 big numbers query for that year
        $yearly_target = DB::table('savings')
            ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
            ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.target_saving')
            ->where('company_id', $id)
            ->sum('target_saving');

        $cummulative_target = DB::table('savings')
        ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
        ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
        ->select('savings.target_saving','month')
        ->where([
            ['company_id', $id],
            ['month', '<=' , $current_month],
            ])
        ->sum('target_saving');

        $cummulative_actual = DB::table('savings')
            ->leftJoin('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
            ->leftJoin('companies', 'companies.id', '=', 'initiatives.company_id')
            ->select('savings.actual_saving','month')
            ->where([
                ['company_id', $id],
                ['month', '<=' , $current_month],
                ])
            ->sum('actual_saving');

        //todo graph query for company dashboard    
        $targets = DB::select('select `month`,
            sum(`savings`.`target_saving`) as target_saving
        from `savings`
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id`
        where `companies`.`id` = :id 
        group by `month`', ['id' => $id]);

        $actual = DB::select('select `month`,
            sum(`savings`.`actual_saving`) as actual_saving
        from `savings`
        inner join `initiatives` on `savings`.`initiative_id` = `initiatives`.`id` 
        inner join `companies` on `companies`.`id` = `initiatives`.`company_id`
        where `companies`.`id` = :id and `month` between 1 and :month
        group by `month`', ['id'=> $id, 'month' => $current_month]);

        $yearly_target_results = DB::select('select `month`, 
            (select sum(target_saving) from savings
            inner join initiatives on savings.initiative_id = initiatives.id
            inner join companies on companies.id = initiatives.company_id
            where companies.id = :id) as yearly_target
        from `savings`  
        group by `month`', ['id'=> $id]);

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

        return view('company-dashboard', compact('last_update', 'id', 'company' ,'yearly_target', 'cummulative_target', 'cummulative_actual', 'graphs'));
    }

    public function company_dashboard_cost_saving_summary($id, $month)
    {
        //todo filter cost saving summary by year
        $current_month = Carbon::now()->month;
        $cummulative_target = Saving::where('month', '<=',$current_month)
            ->with([
                'initiatives.companies' => function($query)use($id){
                    $query->where('id',$id);
                }
            ])
            ->sum('target_saving');

        $cummulative_actual = Saving::where('month', '<=',$current_month)
            ->with([
                'initiatives.companies' => function($query)use($id){
                    $query->where('id',$id);
                }
            ])
            ->sum('actual_saving');

        $initiatives = Initiative::with([
            'savings' => function($query){
                $query->where('month', Carbon::now()->month);
                $query->orderBy('month');
            }
        ])
        ->where('company_id', $id)
        ->get();

        foreach ($initiatives as $k => $v)
        {
            $result = DB::table('savings')
                ->join('initiatives', 'savings.initiative_id', '=', 'initiatives.id')
                ->join('companies', 'companies.id', '=', 'initiatives.company_id')
                ->select('savings.actual_saving', 'savings.target_saving')
                ->where('initiatives.id', $v->id)
                ->where('savings.month', $month)
                ->first();

            $initiatives[$k]->target_saving = null;
            $initiatives[$k]->actual_saving = null;
            if(isset($result->target_saving)) {
                $initiatives[$k]->target_saving = $result->target_saving;

            }

            if(isset($result->actual_saving)) {
                $initiatives[$k]->actual_saving = $result->actual_saving;

            }

        }
        
        //$data['initiatives'] = $initiatives;
        return view('company_dashboard_cost_saving_summary', compact('initiatives', 'id', 'cummulative_target', 'cummulative_actual'));
    }

}

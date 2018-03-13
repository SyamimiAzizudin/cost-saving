<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Initiative;
use App\Saving;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function companylist()
    {
        $savings = Saving::all();
        $companies = Company::all();
        // $companies = Company::pluck('name', 'id');
        return view('saving.company', compact('savings', 'companies'));
    }

    public function index()
    {
        return view('saving.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCompanySaving($company_id)
    {
        $company = Company::findOrFail($company_id);

        $initiatives = Initiative::orderBy('order_id', 'asc')->where('company_id', $company_id)->get();

        $savings = Company::with([
            'initiatives' => function($query) use ($company_id){
                $query->where('company_id',$company_id);
            },
            'initiatives.savings' => function($query){
                $query->orderBy('month');
            }
        ])
            ->where('id', $company_id)
            ->first();

        $data['company'] = $company;
        $data['company_id'] = $company_id;
        $data['initiatives'] = $initiatives;

        #dump($savings);
        $company_savings= [];
        foreach ($savings->initiatives as $k1 => $v1)
        {
            #dump($v1->id);
            #dump($v1);
            if(!empty($v1->savings)) {
                for ($i = 1; $i <= 12; $i++)
                {
                    $company_savings[$v1->id][$i] = [
                        'actual_saving' => null,
                        'target_saving' => null
                    ];
                }
                foreach ($v1->savings as $k2 => $v2) {

                    $company_savings[$v1->id][$v2->month] = [
                        'actual_saving' => $v2->actual_saving,
                        'target_saving' => $v2->target_saving
                    ];
                }
            }
        }
        


        #dd($company_savings);
        $data['company_savings'] = $company_savings;
        return view('saving.company_saving', $data);
    }

    public function saveInitiativeSaving($company_id,Request $request)
    {

        $i = Saving::where('initiative_id', $request->initiative_id)->where('month',$request->month)->first();

        if($i == null)
        {
            $i = new Saving;

        }

        $i->initiative_id = $request->initiative_id;
        $i->{$request->section} = $request->value;
        $i->month = $request->month;
        $i->save();
    }
    public function getInititativeSavingTable($company_id)
    {
        $initiatives = Initiative::orderBy('order_id', 'asc')->where('company_id', $company_id)->get();
        $savings = Company::with([
            'initiatives' => function($query) use ($company_id){
                $query->where('company_id',$company_id);
            },
            'initiatives.savings' => function($query){
                $query->orderBy('month');
            }
        ])
            ->where('id', $company_id)
            ->first();

        $company_savings= [];
        foreach ($savings->initiatives as $k1 => $v1)
        {
            #dump($v1->id);
            #dump($v1);
            if(!empty($v1->savings)) {
                for ($i = 1; $i <= 12; $i++)
                {
                    $company_savings[$v1->id][$i] = [
                        'actual_saving' => null,
                        'target_saving' => null,
                        'display' => null
                    ];
                }
                foreach ($v1->savings as $k2 => $v2) {

                    $company_savings[$v1->id][$v2->month] = [
                        'actual_saving' => $v2->actual_saving,
                        'target_saving' => $v2->target_saving,
                        'display' => $v2->display
                    ];

                }
            }
        }

        #dd($company_savings);

        $data['company_savings'] = $company_savings;
        $data['initiatives'] = $initiatives;
        return view('saving.company_saving_table', $data);
    }

    public function postLockInitiative($company_id)
    {
        // look for all initiative under this company where the month is older than current month

        // set the show flag to 0

        //$company_id = 3;
        $savings_ids = [];
        $current_month = Carbon::now()->month;

        $initiatives = Initiative
            ::whereHas(
            'companies' , function ($query) use ($company_id){
                $query->where('id', $company_id);
            }
        )
        ->with(['savings' => function($query)use($current_month){
            $query->where('month','<=', $current_month);
        }])
        ->get();

        foreach ($initiatives as $k => $v)
        {
           #dump($v->savings);

            foreach($v->savings as $ksaving => $vsaving)
            {
                if($vsaving->display == 1)
                {
                    array_push($savings_ids, $vsaving->id);
                }
            }
        }

        #dump($savings_ids);

        Saving::whereIn('id', $savings_ids)
            ->update(['display' => 0]);

        #dd($initiatives);
    }
}

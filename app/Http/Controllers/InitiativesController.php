<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InitiativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $initiatives = Initiative::all();
        // $initiatives = Initiative::orderBy('order_id', 'asc')->get();
        // $companies = Company::pluck('name', 'id');
        // return view('initiative.index', compact('initiatives', 'companies'));
    }

    public function companylist()
    {
        $initiatives = Initiative::all();
        $companies = Company::all();
        return view('initiative.company', compact('initiatives', 'companies'));
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
        $this->validate($request, [
            'area' => 'required',
            'analyze' => 'required',
            'action' => 'required',
            'order_id' => 'required',
        ]);
        
        $check_order_id = Initiative::where('company_id', $request->company_id)->where('order_id', $request->order_id)->first();

        if($check_order_id != null)
        {
            return redirect()->action('InitiativesController@getCompanyInitiative',['company_id' => $request->company_id])->withMessage('Order id already exists');
        }

        $initiative = new Initiative;
        $initiative->area = $request->area;
        $initiative->analyze = $request->analyze;
        $initiative->action = $request->action;
        $initiative->order_id = $request->order_id;
        $initiative->company_id = $request->company_id;
        $initiative->user_id = Auth::user()->id;
        $initiative->save();
        // dd($request);
        return redirect()->action('InitiativesController@getCompanyInitiative',['company_id' => $request->company_id])->withMessage('Initiative has been successfully added!');
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
        $initiative = Initiative::findOrFail($id);
        return view('initiative.edit', compact('initiative'));
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
        $this->validate($request, [
            'area' => 'required',
            'analyze' => 'required',
            'action' => 'required',
            'order_id' => 'required',
        ]);

        $initiative = Initiative::findOrFail($id);

        $initiative->area = $request->area;
        $initiative->analyze = $request->analyze;
        $initiative->action = $request->action;
        $initiative->order_id = $request->order_id;
        $initiative->company_id = $request->company_id;
        $initiative->save();

        return redirect()->action('InitiativesController@getCompanyInitiative',['company_id' => $request->company_id])->withMessage('Initiative has been successfully added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $initiative = Initiative::findOrFail($id);
        $initiative->delete();
<<<<<<< HEAD
        return back()->withErrors('Initiative has been successfully updated!');
=======
        return back()->withError('Initiative has been successfully removed!');
>>>>>>> 140b2e0dcd3dc4162c9f2ecb1801320328f7ee64
    }

    public function getCompanyInitiative($company_id)
    {
        $company = Company::findOrFail($company_id);

        $initiatives = Initiative::orderBy('order_id', 'asc')->where('company_id', $company_id)->get();

        $companies = Company::pluck('name', 'id');

        return view('initiative.index', compact('company', 'initiatives', 'companies'));

    }
}

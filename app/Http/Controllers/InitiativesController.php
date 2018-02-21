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
        $companies = Company::pluck('name', 'id');
        $initiatives = Initiative::where('company_id',$companies)->get();
        // dd($initiatives);
        return view('initiative.index', compact('initiatives', 'companies'));
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
        ]);
        
        $initiative = new Initiative;
        $initiative->area = $request->area;
        $initiative->analyze = $request->analyze;
        $initiative->action = $request->action;
        $initiative->company_id = $request->company_id;
        $initiative->user_id = Auth::user()->id;
        $initiative->save();

        return redirect()->action('InitiativesController@store')->withMessage('Initiative has been successfully added!');
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
        $initiative = Initiative::findOrFail($id)->pagination(100);
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
        ]);

        $initiative = Initiative::findOrFail($id);
        $initiative->area = $request->area;
        $initiative->analyze = $request->analyze;
        $initiative->action = $request->action;
        $initiative->save();
        
        return redirect()->action('InitiativesController@index')->withMessage('Initiative has been successfully updated!');
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
        return back()->withError('Initiative has been successfully updated!');
    }
}

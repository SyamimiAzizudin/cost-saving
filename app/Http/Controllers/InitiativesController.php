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
        $initiatives = Initiative::with('user')->paginate(5);
        return view('initiative.index', compact('initiatives'));
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
        $init = Initiative::findOrFail($id);
        return view('initiative.edit', compact('init'));
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

        $init = Initiative::findOrFail($id);
        $init->area = $request->area;
        $init->analyze = $request->analyze;
        $init->action = $request->action;
        $init->save();
        
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
        $init = Initiative::findOrFail($id);
        $init->delete();
        return back()->withError('Initiative has been successfully updated!');
    }
}

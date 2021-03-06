<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['companies'])->get();

        $companies = Company::pluck('name','id');

        return view('user.index', compact('users', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $users = new User;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->company_id = $request->company_id;
        $users->role = $request->role;
        $users->save();

        return redirect()->action('UsersController@index')->withMessage('User has been successfully added!');
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
        $companies = Company::pluck('name', 'id');
        $user = User::findOrFail($id);
        // $password = Hash::get('current_password');
        return view('user.edit', compact('companies', 'user'));
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
            'username' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        $user->company_id = $request->company_id;
        $user->role = $request->role;
        $user->save();
        
        return redirect()->action('UsersController@index')->withMessage('User has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->withErrors('User has been successfully updated!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingsController extends Controller
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
        $user_role = auth()->user()->role;
        $users = User::all();

        if($user_role == 'admin'){
            return view('settings')->with('users', $users);
        }else{
            return redirect('/dashboard');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->role = $request->input('role');

        $user->save();

        return redirect('/settings')->with('success', 'User Updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Facility;
use \App\Role;

class UserController extends Controller
{
    public function index()
    {
    	$facilities = Facility::all();
    	$roles = Role::all();
    	$users = User::all();

    	return view('users.index', compact('users', 'facilities', 'roles'));
    }

    public function create()
    {
    	$facilities = DB::table('facilities')->get();
    	$roles = DB::table('roles')->get();

		return view('users.create', compact('facilities', 'roles'));
    }

    public function store()
    {
    	$this->validate(request(), [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'facility' => 'required',
    		'role' => 'required',
    		'email' => 'required|email',
            'password' => 'required|confirmed'
    	]);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'facility_id' => request('facility'),
    		'role_id' => request('role'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	$user->save();

    	return redirect('/users');
    }
    
    public function edit($id)
    {
    	$user = User::find($id);

    	$user->first_name = "Petros";

    	$user->save();

    	return back();
    }
    
    public function delete($id)
    {
	    User::find($id)->delete();

	    return back();
    }
    
}

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
    
    public function update(User $user)
    {
        $user->update($request->all());

        return response()->json([
            'message' => 'Record was edited successfully!',
            'data' => $user->toArray()
          ], 200);  
    }
    
    public function destroy(User $user)
    {
	    $user->delete();

	    return response()->json(null, 204);
    }
    
}

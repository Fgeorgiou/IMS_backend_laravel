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
        $users = User::all();

        foreach ($users as $user) {
            $user->facility;
            $user->role;
        }

        return response()->json(
            ["users" => $users->toArray()],
            200
        );
    }

    public function create()
    {

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

    	return response()->json($user, 201);
    }

      public function show($id)
      {
        return response()->json([
          'data' => User::find($id)->toArray()
        ], 200);
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

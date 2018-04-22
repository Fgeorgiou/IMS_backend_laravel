<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Facility;
use \App\Role;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->facility;
            $user->role;
        }

        return response()->json([
            "users" => $users->toArray()
            ],200
        );
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'facility' => 'required',
    		'role' => 'required',
    		'email' => 'required|email|unique:users',
            'password' => 'required'
    	]);

        if($validator->fails()){
            $message = $validator->errors();
            return response()->json([
                'message' => 'Oops! Something went wrong!',
                'status' => 400,
                'errors' => $message
            ]);  
        }

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'facility_id' => request('facility'),
    		'role_id' => request('role'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'User created successful!',
            'status' => 201,
            'user' => $user->toArray()
        ]);

    }

      public function show($id)
      {
        return response()->json([
          'data' => User::find($id)->toArray()
        ], 200);
      }
    
    public function update($id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json([
            'message' => 'Record was edited successfully!',
            'data' => $user->toArray()
          ], 200);  
    }
    
    public function destroy($id)
    {
	    User::where('id', '=', $id)->delete();

	    return response()->json(null, 204);
    }
    
}

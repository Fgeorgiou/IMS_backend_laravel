<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationsController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email',
            'password' => 'required|confirmed'
    	]);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	auth()->login($user);

    	return redirect('/');
    }
}

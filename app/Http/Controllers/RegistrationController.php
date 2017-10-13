<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegistrationController extends Controller
{
    //


    public function create()
    {
        
    	return view('/registration.create');

    }


    public function store(Request $request)
    {

        //Validate form
        $this->validate($request, [
            'username' => 'required|max:50',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'required|min:10|confirmed',
        ]);


        //Create and save user
        //$user = User::create(request(['username', 'first_name', 'last_name', 'password']));


        //Create user
        $user = new User;

        $user->username = request('username');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->password = bcrypt(request('password'));       


        //Save to database
        $user->save();

        //Sign user in
        auth()->login($user);

        //Redirect
        return redirect('/');

    }
}

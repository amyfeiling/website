<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    //
    public function __constructor()
    {

        $this->middleware('guest', ['except' => 'destroy']);

    }
	


    public function create()
    {
        
        return view('/sessions.create');
        
    }

    public function store(Request $request)
    {
     
        $credentials = $request->only('username','password');
        //dd(auth()->attempt($credentials));


        //Atempt to authenticate the user
        if (! auth()->attempt($credentials))
        //if (! auth()->attempt(request(['username', 'password'])))
        {
            
            return back()->withErrors([

                'message' => 'Please check your credentials and try again.'

            ]);
        };

        //Redirect
        return redirect('/');

    }


    public function destroy()
    {

    	//Logout user
    	auth()->logout();

    	

    	//Redirect
    	return redirect('/');
    }

}

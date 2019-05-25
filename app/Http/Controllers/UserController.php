<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postRegister(Request $request) //handle request when register is clicked
    {
        $this->validate($request, [ //define the input validation rules 
            'email' => 'email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);

        $email = $request['email']; //get email form field form request array etc...
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);  //hash password

        $user = new User(); //create new user and set properties
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save(); //save user to DB

        Auth::login($user); //automatically login user after registering

        return redirect()->route('dashboard');
    }

    public function postLogin(Request $request) //handle request when login is clicked
    {
        $this->validate($request, [ //define the input validation rules 
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) //try to login user
        {
            return redirect()->route('dashboard'); //load dashboard
        }
        else
        {
            return redirect()->back(); //else go back to welcome page
        }
    }

    public function getLogout()
    {
        Auth::logout(); //log user out
        return redirect()->route('home');
    }
}
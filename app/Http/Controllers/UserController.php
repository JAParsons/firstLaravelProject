<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postRegister(Request $request) //handle request when register is clicked
    {
        $email = $request['email']; //get email form field form request array etc...
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);  //hash password

        $user = new User(); //create new user
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save(); //save user to DB

        return redirect()->back();
    }

    public function postLogin(Request $request) //handle request when login is clicked
    {
        
    }
}
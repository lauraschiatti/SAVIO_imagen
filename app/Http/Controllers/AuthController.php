<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        //return $request->all();

        $username = trim($request->input('username'));
        $pass = $request->input('password');


        /*if (Auth::attempt(['username' => $username, 'password' => $pass])) {
            return Auth::user();
            //return redirect()->back();
        }else {
            $error = "WRONG USER OR PASSWORD";
            return view('auth.login', compact('error'));
        }*/
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');

    }
}

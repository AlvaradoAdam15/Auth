<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    public function postLogin(Request $request)
    {
        echo "Hello to postLogin";

        if ($this->login($request->email, $request->password)){
            //Redirect to HOME
            return redirect()->route('auth.home');
        } else {
            //Redirect Back
            return redirect()->route('auth.login');
        }
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login()
    {
        //Mirar bé a la BD
        return true;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class loginController
 * @package App\Http\Controllers
 */
class loginController extends Controller
{
    /**
     * Process a login HTTP POST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        //TODO
        echo "Hello to postLogin";

        if ($this->login($request->email, $request->password)){
            //Redirect to HOME
            return redirect()->route('auth.home');
        } else {
            //Redirect Back
            return redirect()->route('auth.login');
        }
    }

    /**
     * get Login
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('login');
    }

    /**
     * @return bool
     */
    public function login()
    {
        //TODO: Mirar bé a la BD
        return true;
    }
}

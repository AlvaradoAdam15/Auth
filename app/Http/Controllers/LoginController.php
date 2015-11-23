<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\User;
/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) {
        //TODO
        //dd($request->all());
        //\Debugbar::info("Ok entra a postLogin");
        //echo "asdasd";

        //TODO: Mirar bé a la base de dades
        //$user = User::findOrFail(id);
        //$user = User::all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        } else {

        }

    }

  public function getLogin() {
       return view('login');
   }
}
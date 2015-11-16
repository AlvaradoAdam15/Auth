<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class RegisterController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('register');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function postRegister(Request $request)
    {
        //dd(Input::all());
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique::users,email',
            'password' => 'required|confirmed',
        ]);

        //dd(Input::all());
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();
        //User::create(Input::all());
        return redirect(route('auth.getLogin'));
    }
}
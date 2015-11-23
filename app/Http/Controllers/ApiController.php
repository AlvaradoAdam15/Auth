<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ApiController extends Controller
{
    public function checkEmailExsists(Request $request)
    {
        //$email = Input::get('email');
        $email = $request->get('email');

        //TODO compovar email correctament
        \Debugbar::info("comprovant email " . $email);
        if ($this.$this->checkEmailExsists($email)){
            return true;
        } else {
            return false;
        }
        return "comprovant email " . $email;
    }

    public function checkEmail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user == null){
            return true;
        } else {
            return true;
        }
    }
}

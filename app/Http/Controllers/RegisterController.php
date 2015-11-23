<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class RegisterController extends Controller
{

    protected $email;
    protected $name;
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        //dd(Input::all());
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        $this->email = $request->get('email');
        $this->name = $request->get('name');
        $this->sendRegisterEmail();

        //User::create(Input::all());
        return redirect(route('auth.getLogin'));
    }

    private function sendRegisterEmail()
    {
        $emailData = new \stdClass();

        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "Welcome user" . $this->name;

        $data['name'] = $this->name;

        \Mail::send('emails.message', $data, function($message) use ($emailData) {
           $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);
        });

    }


}
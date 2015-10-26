<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/postLogin', ['as'=>'auth.postLogin', 'uses' =>'loginController@postLogin']);
Route::get('/login', 'loginController@getLogin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/resource', function () {
    $authenticated = false;
    if (Session::has('authenticated')){
        if (Session::get('authenticated') == true) {
            $authenticated = true;
        }
    }

    if ($authenticated){
        \Debugbar::stopMeasure("resource");
        return view('resource');
    } else {
        \Debugbar::stopMeasure("resource");
        return view('login');
    }

});

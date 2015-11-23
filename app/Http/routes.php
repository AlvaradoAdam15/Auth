<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [
    'as' => 'auth.getLogin',
    'uses' => 'LoginController@getLogin'] );

Route::post('/postLogin', [
    'as' => 'auth.postLogin',
    'uses' => 'LoginController@postLogin']);

Route::get('/home', ['as' => 'auth.home', function () { return view('home'); }]);

Route::get('/resource', function () {
//    $authenticated = false;
//    //Session::set('authenticated', false);
//    if (Session::has('authenticated'))
//    {
//        if (Session::get('authenticated') == true)
//        {
//            $authenticated = true;
//        }
//    }
//    if ($authenticated)
//    {
//        return view('resource');
//    }
//    else
//    {
//        return redirect()->route('auth.getLogin');
//    }
    if(Auth::check()){
        return view('resource');
    } else {
        return redirect()->route('auth.getLogin');
    }
});

Route::get('/register', [
    'as' => 'auth.register',
    'uses' => 'RegisterController@getRegister']);

Route::post('/register', [
    'as' => 'register.postRegister',
    'uses' => 'RegisterController@postRegister']);
Route::get('/checkEmailExsists', [
    'as' => 'checkEmailExsists',
    'uses' => 'ApiController@checkEmailExsists'
]);
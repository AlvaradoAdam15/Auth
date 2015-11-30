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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/resource', ['as' => 'resource', 'middleware' => 'auth', function () {
        return view('resource');
    }]);
    Route::get('/phpinfo', function(){
        return phpinfo();
    });

});

Route::get('/flushSession',
    ['as'=>'session.flush',
    function(){
        Session::flush();
    }]);

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
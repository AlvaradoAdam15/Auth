<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/resource', ['as' => 'resource', 'middleware' => 'auth', function () {
        return view('resource');
    }]);

    Route::get('/phpinfo', function(){
        return phpinfo();
    });

    Route::get('/home', ['as' => 'auth.home', function () { return view('home'); }]);
});

Route::get('/flushSession',
    ['as'=>'session.flush',
    function(){
        Session::flush();
}]);

Route::get('/checkEmailExsists', [
    'as' => 'checkEmailExsists',
    'uses' => 'ApiController@checkEmailExsists'
]);
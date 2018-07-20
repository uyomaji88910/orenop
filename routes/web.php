<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

// User registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::group(['middleware' => 'auth_ip'], function () {
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
});    
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
// GHR login
Route::get('ghr/login', 'GhrController@login')->name('ghr.login');
Route::post('ghr/login', 'Auth\LoginController@login')->name('ghr_login.post');
// 


//Attend Function 2018/07/05 add by Ryo Nakajima
Route::group(['middleware' => 'auth'], function () {
    Route::resource('attends', 'AttendsController', ['only' => ['show', 'edit']]); // add Ryo Nakajima 2018/07/13
    Route::group(['middleware' => 'auth_ip'], function () {   
        Route::put('attends/{attend}/edit', 'AttendsController@update')->name('attends.update');
    });
    // GHR   ミドルウェアの中のミドルウェアやで！！！！
    Route::group(['middleware' => 'auth_ghr'], function () {
        Route::get('ghr/attend', 'GhrController@attend')->name('ghr.attend');
        Route::get('ghr/late', 'GhrController@late')->name('ghr.late');
        Route::post('ghr/late', 'GhrController@arrival')->name('ghr.arrival');
        Route::delete('ghr/late', 'GhrController@notarrival')->name('ghr.notarrival');
        Route::get('ghr/absent', 'GhrController@absent')->name('ghr.absent');
        Route::get('ghr/notattend', 'GhrController@notattend')->name('ghr.notattend');
        Route::get('ghr/attend/download', 'GhrController@csv')->name('ghr.csv');
        Route::get('ghr/attend/download_month', 'GhrController@csv_month')->name('ghr.csv_month');
        
    });
});

   // list 
    Route::get('lists/attend', 'AttendsController@attend')->name('lists.attend');
    Route::get('lists/late', 'AttendsController@late')->name('lists.late');
    Route::get('lists/absent', 'AttendsController@absent')->name('lists.absent');
    Route::get('lists/notattend', 'AttendsController@notattend')->name('lists.notattend');
// add by Ryo Nakajima 2018/07/06 for late and absent

//ip address の試作
Route::get('others', function() {
    return view('others');
})->name('others.get');
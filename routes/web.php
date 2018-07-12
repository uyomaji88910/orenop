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
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


//Attend Function 2018/07/05 add by Ryo Nakajima
Route::group(['middleware' => 'auth'], function () {
    Route::resource('attends', 'AttendsController', ['only' => ['edit','show', 'update']]);
    // list 
    Route::get('lists/attend', 'AttendsController@attend')->name('lists.attend');
    Route::get('lists/late', 'AttendsController@late')->name('lists.late');
    Route::get('lists/absent', 'AttendsController@absent')->name('lists.absent');
    Route::get('lists/notattend', 'AttendsController@notattend')->name('lists.notattend');
});

// add by Ryo Nakajima 2018/07/06 for late and absent
Route::get('others', function() {
    return view('others');
})->name('others.get');

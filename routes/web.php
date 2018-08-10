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
/*
Route::get('/', function () {
    return view('auth/login');
});
*/
//Route::group(['middleware' => 'auth_Int_Ext'], function () {
// logout when the user logged in
Route::get('/', 'AttendsController@index')->name('index');
//});
Route::get('welcome', 'AttendsController@yoroshiku')->name('yoroshiku.get');// signup後遷移する場所

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
        Route::post('ghr/late', 'GhrController@arrival')->name('ghr.arrival'); //button function for arrival time
        Route::delete('ghr/late', 'GhrController@notarrival')->name('ghr.notarrival');  //cancel
        Route::post('ghr/confirm', 'GhrController@confirm')->name('ghr.confirm');  //buttin function for confimation
        Route::delete('ghr/confirm', 'GhrController@notconfirm')->name('ghr.notconfirm');  //cancel     
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

//欠席遅刻のかたはこちら
Route::get('others', function() {
    return view('others');
})->name('others.get');
// 2度目以降の方はこちら
Route::get('second_login', function() {
    return view('second_login');
})->name('second.get');
//help
Route::get('help_users', 'AttendsController@help_users')->name('help_users.get');// help_users
Route::get('help_ghr', 'AttendsController@help_ghr')->name('help_ghr.get');// help_users
//About orenop
//Route::get('aboutus', function() {
//    return view('aboutus');
//})->name('aboutus.get');
Route::get('aboutus', 'AttendsController@aboutus')->name('aboutus.get');// aboutus

//test
Route::get('test1', 'AttendsController@test1')->name('test1.get'); // for login internal route
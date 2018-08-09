<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/logout';    //SignUpしたらログアウトします by chee
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nickname' => 'required|string|max:255|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
// ホームに対するものも追加
            'password' => 'required|string|min:6|confirmed',
            'employee_num' => 'required|integer|unique:users', // need digit9 ex.100013869
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['employee_num'] = (integer)$data['employee_num']; // string to integer 2018/08/09 Ryo Nakajima 
        return User::create([
            'nickname' => $data['nickname'],
            'employee_num' => $data['employee_num'],
  //          'email' => $data['email'],
            'team_number' => $data['team_number'],
            'team_class' => $data['team_class'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function redirectTo()
    {
        \Auth::logout();
        return 'welcome';
    }
}

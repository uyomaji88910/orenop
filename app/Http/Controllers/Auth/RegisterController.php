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
            'password' => 'required|string|min:6|confirmed',
            'employee_num' => 'required|integer|unique:users|digits:9',//min:100000000|max:999999999', // need digit9 ex.100013869
            //'reason' => 'filled|string',
            'startdate' => 'date|after:tomorrow',
            'advanced_field' => 'required|string|max:255',
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
        $data['employee_num'] = (integer)$data['employee_num']; 
        return User::create([
            'nickname' => $data['nickname'],
            'employee_num' => $data['employee_num'],
            'team_number' => $data['team_number'],
            'team_class' => $data['team_class'],
            'advanced_field' => $data['advanced_field'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function redirectTo()
    {
        \Auth::logout();
        return 'welcome';
    }
}

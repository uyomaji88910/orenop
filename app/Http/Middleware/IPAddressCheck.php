<?php

namespace App\Http\Middleware;

use Closure;

class IPAddressCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //$test = \Request::ip();
        $ip_array = array ('133.237.7.64');
        
        //status とってくる
        $status = $_REQUEST['status'];
        
        for ($i = 65; $i <= 95 ; $i++) {
            $push_array = '133.237.7.' . $i;
            array_push ( $ip_array ,$push_array );
        }
            $judge_ip = in_array($ip, $ip_array);
            $judge1 = !$judge_ip && $status == 1;
            $judge2 = !$judge_ip && $status == 'Attend';
            $judge3 = $judge1 || $judge2;
            
            
        if ($judge3){
            return redirect()->back();
        }
        else {
        }
        return $next($request);
    }
}
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
        if (!$judge_ip && $status == 1){
            
            return redirect()->back();
        }
        else {
        }
        return $next($request);
    }
}

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
        
        for ($i = 65; $i <= 95 ; $i++) {
            $push_array = '133.237.7.' . $i;
            array_push ( $ip_array ,$push_array );
        }
        var_dump($ip);
        var_dump($ip_array);
        //print $rakuten_ip;
        if (in_array($ip, $ip_array)){
        var_dump('yes');
        }
        else {
        var_dump('no');
        }
        exit;
        return $next($request);
    
    }
}

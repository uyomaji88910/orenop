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
        $test = \Request::ip();
        $rakuten_ip = '10.49.97.17'
        print $test;
        print $rakuten_ip;
        if ($test == $rakuten_ip)
        
        //print $_SERVER['REMOTE_ADDR'];
        var_dump('yes');
        exit;
        else {
        var_dump('no');
        }
        exit;
        return $next($request);
    }
}

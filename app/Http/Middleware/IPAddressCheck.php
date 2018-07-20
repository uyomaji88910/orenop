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
        $rakuten_ip = '127.0.0.1';
        print $test . PHP_EOL;
        print $rakuten_ip;
        if ($test == $rakuten_ip){
        
        //print $_SERVER['REMOTE_ADDR'];
        var_dump('yes');
        }
        else {
        var_dump('no');
        }
        exit;
        return $next($request);
    }
}

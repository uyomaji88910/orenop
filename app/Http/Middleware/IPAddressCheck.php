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
        $test1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $test = \Request::ip();
        $rakuten_ip = '133.237.7.89';
        var_dump($_SERVER);
        var_dump($test1) . PHP_EOL;
        var_dump($test);
        print $rakuten_ip;
        if ($test1 == $rakuten_ip){
        
        var_dump('yes');
        }
        else {
        var_dump('no');
        }
        exit;
        return $next($request);
    }
}

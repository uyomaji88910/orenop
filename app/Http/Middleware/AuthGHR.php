<?php

namespace App\Http\Middleware;

use Closure;
use App\Attend;
use App\User;

class AuthGHR
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
        $id = \Auth::id();
        $user = User::find($id);
        
        if($user->nickname !=='GHR'){
           
            return redirect()->back();
        }
        return $next($request);
    }
}

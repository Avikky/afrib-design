<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\myAuth\LoginController as Login;

class CheckCustomUrl
{ 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('username', $username)->where('uu_id', $code)->first();
        if($user){
            $request['email'] = $user->email;

            //here user exist login the user
            Auth::login($user);
        
        return $next($request);
    }
}

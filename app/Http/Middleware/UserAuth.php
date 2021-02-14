<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        if($request->path()=="login" && $request->session()->has('user')){
            redirect('/dashboard');
        }
        if($request->path()=="dashboard" && $request->session()->has('user')){
            redirect('/');
        }
        return $next($request);
    }
}

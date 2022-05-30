<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Illuminate\Support\Facades\Auth;

class adminauth
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
        if(Auth::check() && Auth::user()->users_role == 1){
            return $next($request);
        }
        else{
            if($request->url() == 'http://holidate.es/adminpanel/dashboard' || $request->url() == 'http://holidate.es/adminpanel'){
                return redirect()->route('admin.login');
            }
            return redirect()->route('login_web');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Comapny;
use App\Employee;
use Session;
use DB;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->users_role == 1) 
        {
            /*echo "helloqqq"; die;*/
            $odata = Auth::user();            
            if ($odata) 
            {
                Session::put('gorgID',$odata->id);
                Session::put('userRole',Auth::user()->users_role);
            }
            else
            {
                Session::put('gorgID',1);
            }  
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->users_role == 2) 
        {
            $odata = Auth::user();
            if ($odata) 
            {
                Session::put('gorgID', $odata->id);
                Session::put('userRole', Auth::user()->users_role);
            }
            return $next($request);
        } 
        else 
        {
            echo "hello"; die;
            return redirect('login_web');
        }
    }
}

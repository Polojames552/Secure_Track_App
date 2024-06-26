<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class isCrimeLab
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == '4')// normal user = 0    admin = 1
            {
                return $next($request);
            }
            else{
                if(Auth::user()->role == '1')// normal user = 0    admin = 1
                {
                    return redirect('/superAdminDashboard')->with('status','Access Denied! You are not an Admin!');
                }else{
                    return redirect('/municipalAdminDashboard')->with('status','Access Denied! You are not an Admin!');
                }
            }
          }
          else{
            return redirect()->back()->with('status','Access Denied! You are not an Admin!');
          }
    }
}

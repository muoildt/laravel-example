<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // $id = Auth::id();
    public function handle($request, Closure $next)
    {
        
         
        // $permission = explode('|', $permission);
        return $next($request);
        // if(checkPermission($permission)){
        //     return $next($request);
        // }
        // return response()->view('errors.check-permission');
    }
}

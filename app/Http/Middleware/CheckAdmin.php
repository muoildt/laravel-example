<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {       $role = Auth::user()->role;
            if ($role != 0) {    
                return redirect()->route('members.index')->with('success','You do not have permission!');   
            }
            return $next($request);
            
            
        
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // admin
        if(Auth::user()->role == 'admin') {
           return $next($request);
        }
        else if(Auth::user()->role == 'editor'){
            return $next($request);

        } else if(Auth::user()->role == 'user') {
            return $next($request);
        } else {
          return redirect()->back();
        }

    }
}

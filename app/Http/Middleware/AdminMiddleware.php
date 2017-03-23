<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        if ( $user = Auth::user() ) {

            if ( $user->name != 'admin')
            {
                return redirect('/login');
            }
            return $next($request);
        }
        else return redirect('/login');
        
    }
}

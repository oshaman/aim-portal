<?php

namespace App\Http\Middleware;

use Closure;

class Account
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
        if(Auth::check() && Auth::user()->canDo('VIEW_ADMIN'))
        {
            return $next($request);
        }
        abort(404);
    }
}

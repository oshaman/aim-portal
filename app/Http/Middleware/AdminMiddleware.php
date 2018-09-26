<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

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
        if(Auth::check() && Auth::user()->canDo('VIEW_ADMIN'))
        {
//            if (in_array($request->segment(2), config('settings.locales'))) {
//                App::setLocale($request->segment(2));
//            } else {
//                // set default / fallback locale
//                App::setLocale('uk');
//            }
            return $next($request);
        }

        abort(404);
    }
}

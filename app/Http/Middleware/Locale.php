<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        $segment = $request->segment(1);

        if (in_array($segment, config('settings.locales'))) {
            app()->setLocale($segment);
        } else {
            app()->setLocale('uk');
        }

        return $next($request);
    }
}

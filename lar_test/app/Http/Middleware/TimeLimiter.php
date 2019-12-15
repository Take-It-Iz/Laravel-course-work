<?php

namespace App\Http\Middleware;

use Closure;

class TimeLimiter
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
        if (date('H') == 13) {
            return response('Обідня перерва. Заходьте пізніше');
        }
        return $next($request);
    }
}

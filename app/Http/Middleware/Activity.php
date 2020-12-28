<?php

namespace English\Http\Middleware;

use Closure;
use English\Facades\Activity as Action;

class Activity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Action::log('Standard User Action');

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUserIsAdmin
{

    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $roles = auth()->user()->roles->pluck('name')->toArray();
            if (in_array('administrator', $roles)) {
                return $next($request);
            }
        }
        abort(403);
    }
}

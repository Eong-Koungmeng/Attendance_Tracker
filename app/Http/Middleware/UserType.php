<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        if ($request->user()->user_type !== $type) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

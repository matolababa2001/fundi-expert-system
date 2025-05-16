<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            abort(401, 'Not logged in.');
        }
    
        if (!auth()->user()->is_admin) {
            abort(403, 'Not an admin.');
        }
    
        return $next($request);
    }
    
    }
}

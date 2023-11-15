<?php

// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the admin role
        if (auth()->check() && auth()->user()->role == 1) {
            return $next($request);
        }

        // Redirect to the home page or show an unauthorized view
        return redirect('/');
    }
}


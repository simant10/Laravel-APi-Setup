<?php
namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    { die("before Action");
        // Perform action
        
        return $next($request);
    }
}
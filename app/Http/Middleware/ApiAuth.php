<?php
namespace App\Http\Middleware;
use Closure;
class ApiAuth
{

    public function handle($request, Closure $next)
    {
        // Perform action
        
        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Carbon\Carbon;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    { 
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    public function handle($request, Closure $next)
    { 
        $params = $request->json()->all();
        $request->attributes->add(['params' => $params]);
        $response = $next($request);
        if($response->exception){
            return $response;
        }
        
        $content = json_decode($response->getContents(),true);
        $content['status']=config("constants.STATUS_SUCCESS");
        $content['statusCode']=config("constants.STATUS_SUCCESS_CODE");
        $content['timeStamp']=Carbon::now()->toDateTimeString();
        $response->setContent(json_encode($content));
        return $response;
    }
}

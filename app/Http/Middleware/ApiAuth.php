<?php
namespace App\Http\Middleware;
use \App\Exceptions;
use Closure;
use Carbon\Carbon;
class ApiAuth
{
    public $attributes;
    public function handle($request, Closure $next)
    {   
        $params = $request->json()->all();
        $request->attributes->add(['params' => $params]);
        $response = $next($request);
        if($response->exception){
            return $response;
        }
        
        $content['data'] = json_decode($response->getContent(),true);
        $content['status']=config("constants.STATUS_SUCCESS");
        $content['statusCode']=config("constants.STATUS_SUCCESS_CODE");
        $content['timeStamp']=Carbon::now()->toDateTimeString();
        $response->setContent(json_encode($content));
        return $response;
    }
}
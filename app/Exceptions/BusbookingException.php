<?php
namespace App\Exceptions;
use Illuminate\Http\Response;
use Exception;
use Carbon\Carbon;
class BusbookingException extends Exception{
    public $response;
    public function report()
    {
    }
    public function returnJsonError($exception)
    { 
      $exceptionCode=500;
      $errorMessage ="Some error occured, Please try again later";
      if($exception->getCode()){
          $exceptionCode=$exception->getCode();
      }
      if(!$exception->getMessage()){
          $errorMessage=config("constants.errorCode")[$exceptionCode];
      }elseif($exception->getMessage()){
          $errorMessage=$exception->getMessage();
      }
        
      return response()->json(["status"=>"error","statusCode"=>$exceptionCode,"message"=>$errorMessage,"timestamp"=>Carbon::now()->toDateString()]);
    }
}
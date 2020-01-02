<?php
namespace App\Http\Controllers;
use App\Http\Library\Common;
use Illuminate\Http\Request;
class CommonController extends Controller{
    
    protected $commonLibraryObj;
    public function __construct(){
        $this->commonLibraryObj = new Common();
    }
    
    public function getStateList(Request $request){
        return $this->commonLibraryObj->stateList();
    }
}
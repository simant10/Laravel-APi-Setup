<?php
namespace App\Http\Controllers;
use App\Http\Library\Common;

class CommonController extends Controller{
    
    protected $commonLibraryObj;
    public function __construct(){
        $this->commonLibraryObj = new Common();
    }
    
    public function getStateList(){
        return $this->commonLibraryObj->stateList();
    }
}
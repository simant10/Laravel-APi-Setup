<?php
namespace App\Http\Library;
use App\Http\Entity\CommonEntity;

class Common {
    protected $commonEntityObj;
    public function __construct(){
        $this->commonLibraryObj = new CommonEntity();
    }
    public function stateList(){
        $stateList=array();
        $filter=array();
        $stateRawData = $this->commonLibraryObj->getState($filter);
        $stateList = $this->filterStateData($stateRawData);
        return $stateList;
    }
    
    public function filterStateData(array $stateRawData):array{ 
        $response=array();
        $index=0;
        foreach($stateRawData as $state){
            $response[$index]['state_name'] =$state->state;
            $response[$index]['state_id'] =$state->state_id;
            $index++;
        }
        return $response;
    }
}
<?php
namespace App\Http\Entity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Exceptions\BusbookingException;
class CommonEntity extends Model{

    public function getState(array $filter){
        try{
            $query = DB::table('state');
            if(isset($filter['country_id']) && $filter['country_id'] > 0){
                $query->where("country_id","=",$filter['country_id']);
            }
            $queryResult = $query->get()->toArray();
            return $queryResult;
        }catch(\Exception $ex){
            throw new BusbookingException('',600);
        }
       
    }
    
    
}
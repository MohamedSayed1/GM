<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/9/2019
 * Time: 5:14 AM
 */

namespace App\gm\travel\Services;

use Validator;
use App\gm\Services;
use App\gm\travel\Repository\TravelRepository;

class TravelServices extends  Services
{
    private  $travelRepository;

    public function __construct()
    {
        $this->travelRepository=new TravelRepository();
    }

    public  function addTravel($request){

        $rules = [
            'travel_name'   => 'required',
            'start_day'     => 'required',
            'end_day'       => 'required',
            'transportaion'=>'required',
            'hotel_name'    =>  'required',
            'is_active'     => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
        if($this->travelRepository->addTravel($request->all())){
            return true;
        }
        else{
            $this->setError('Error');
            return false;}
    }
   public function updateTravel($request){
       $rules = [
           'travel_name'   => 'required',
           'start_day'     => 'required',
           'end_day'       => 'required',
           'transportaion'=>'required',
           'hotel_name'    =>  'required',
           'is_active'     => 'boolean'
       ];

       $validator = Validator::make($request->all(),$rules);

       if($validator->fails())
       {
           $this->setError($validator->errors()->all());
           return false;
       }
       if($this->travelRepository->updateTravel($request->all())){
           return true;
       }
       else{
           $this->setError('Error');
           return false;}
   }
   public function getTravels(){
        return$this->travelRepository->getTravels();
   }

   public function getTravelById($id){

    return $this->travelRepository->getTravelById($id);

   }
   public function countOfTravels(){
        return $this->travelRepository->countOfTravels();
   }
    public function  deleteTravel($id)
    {
        if ($this->travelRepository->deleteTravel($id))
            return true;
        else {
            $this->setError('Error :- this user not found');
            return false;
        }
    }
    public function updateActive($id,$status){
        if($this->travelRepository->UpdateActive($id,$status))
            return true;
        $this->setError('Try again');
        return false;
    }

public function searchTravel($request){
    $travel=$this->travelRepository->searchCourses($request->all());
    if(!$travel){
        $this->setError('غير موجود');
        return false;

    }
    return $travel;

}

}
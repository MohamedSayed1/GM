<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 1:40 AM
 */

namespace App\gm\travel\Services;


use App\gm\Services;
use App\gm\travel\Repository\subscribeRepository;
use Validator;

class subscribeServices extends  Services
{
 private $subscribeRepository;
public function __construct()
{
    $this->subscribeRepository= new subscribeRepository();
}

    public function addSubscribe($request){

     $rules = [
         'travel_id'   => 'required',
         'partner_id'     => 'required',
         'id_level'       => 'required',
         'count_of_travel'=>'required',

         'currency_id'     => 'required',
         'total'    =>  'required',
         'current_paid'    =>  'required',
         'remaining_payment'    =>  'required'

     ];

     $validator = Validator::make($request->all(),$rules);

     if($validator->fails())
     {
         $this->setError($validator->errors()->all());
         return false;
     }
     if($this->subscribeRepository->addSubscribe($request->all())){
         return true;
     }
     else{
         $this->setError('Error');
         return false;}
 }
 public function getSubscribeById($id){
    $subscribe=$this->subscribeRepository->getSubscribeById($id);
       if($subscribe)
           return $subscribe;
        $this->setError('not found');

 }

 public function getSubscribes(){
    return $this->subscribeRepository->getSubscribes();
 }
}
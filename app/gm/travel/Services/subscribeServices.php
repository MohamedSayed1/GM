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
 private $subRepo;
    public function __construct()
    {
        $this->subRepo= new subscribeRepository();
    }

    public function addSubscribe($request)
    {

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
        $messages = [
            'travel_id.required'=>' برجاء ادخال الرحله ',
            'partner_id.required'=>' برجاء ادخال الشريك',
            'id_level.required'=>'مستوى الرحله',
            'count_of_travel.required'=>'عدد المسافرين',
            'currency_id.required'=>'العمله',


            'current_paid.required'=>'الدفوع حاليا',
            'remaining_payment.required'=>'الباقى',

        ];


        $validator = Validator::make($request->all(),$rules,$messages);

     if($validator->fails())
     {
         $this->setError($validator->errors()->all());
         return false;
     }
     if($this->subRepo->addSubscribe($request->all())){
         return true;
     }
     else{
         $this->setError('Error');
         return false;}
     }



     public function getSubscribes()
     {
        return $this->subRepo->getSubscribes();
     }
}
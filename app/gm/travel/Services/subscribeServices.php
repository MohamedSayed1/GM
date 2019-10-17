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

    public function addSubscribe($data)
    {

        $rules = [
            'travel_id'       => 'required|integer',
            'partner_id'      => 'required|integer',
            'count_of_travel' => 'required|integer',
            'current_paid'    => 'nullable|numeric',
            'prices'          => 'required|numeric',
            'pound'           => 'nullable|numeric',

        ];
        $messages = [
            'travel_id.required' => ' برجاء ادخال الرحله ',
            'partner_id.required' => ' برجاء ادخال الشريك',
            'count_of_travel.required' => 'عدد المسافرين',
            'prices.required' => 'يجب ادخال سعر الفرد',
            'pound.numeric' => 'قيمه العمله يجب ان تكون رقما',
            'current_paid.numeric' => 'المدفوع يجب ان تكون رقما',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // total =  count_of_travel * prices * pound
        $data['pound'] = isset($data['pound'])?$data['pound'] :1;
        $data['total'] = $data['count_of_travel'] * $data['prices'] *$data['pound'] ;

        if($data['current_paid']!=null)
        {
            $data['remaining'] = $data['total'] - $data['current_paid'] ;
        }



        if($this->subRepo->addNew($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;


    }


     public function getSubscribes()
     {
        return $this->subRepo->getSubscribes();
     }

     // get partner By Travel _id

    public function getParnterByTraId($id = 0)
    {
        return $this->subRepo->getPartnerByTravel($id);
    }

    public function getParnterNameAndId($id)
    {
        return $this->subRepo->getParnterNameAndId($id);
    }
}
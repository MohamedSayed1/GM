<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 1:40 AM
 */

namespace App\gm\travel\Services;


use App\gm\Services;
use App\gm\travel\Model\Subscribe;
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


        ];
        $messages = [
            'travel_id.required' => ' برجاء ادخال الرحله ',
            'partner_id.required' => ' برجاء ادخال الشريك',
            'count_of_travel.required' => 'عدد المسافرين',
            'prices.required' => 'يجب ادخال سعر الفرد',
            'current_paid.numeric' => 'المدفوع يجب ان تكون رقما',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        $data['total'] = $data['count_of_travel'] * $data['prices'] ;

        // check current paid
        if($data['current_paid']!=null) {
          $checkPaid = $data['total'] - $data['current_paid'];

            if ($checkPaid > 0)
            {
                $data['paid'] = 0;
            }
            elseif ($checkPaid == 0)
            {
                $data['paid'] = 1;
            }
            else {
                $this->setError('المدفوع قيمته اكبر من الاجمالي !!!');
                return false;
            }
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

    public function del($id)
    {
        $sub = $this->subRepo->getSubById($id);
         if(!empty($sub))
         {
             if($this->subRepo->checkCount($sub->travel_id,$sub->partner_id) == 1)
             {
                if($this->subRepo->del($id))
                    return true;



                $this->setError('عفوا حدث خطاء برجاء المحاوله مره اخري ');
                return false;
             }
                 $this->setError(['لا يمكنك الحذف لان العميل لديه كذا مبيعات في هذه الرحله يمكنك صرف قيمه المبيعات بدل من الحذف ']);
             return false;
         }

         $this->setError(['اختار عنصر موجود حتي !!']);
         return false;
    }
}
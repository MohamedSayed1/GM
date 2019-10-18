<?php


namespace App\gm\travel\Services;


use App\gm\Partner_payment;
use App\gm\Services;
use App\gm\travel\Repository\paymentRepository;
use Validator;

class paymentServices extends Services
{

    use Partner_payment;
 private $payRepo;

 public function __construct()
 {
     $this->payRepo = new paymentRepository();
 }
    // add new
    public function addNew($data)
    {

        // valid
        $rules = [
            'travel_id'       => 'required|integer',
            'partner_id'      => 'required|integer',
            'payment'         => 'required|numeric',
            'date'             => 'required|date',

        ];
        $messages = [
            'travel_id.required' => ' برجاء ادخال الرحله ',
            'partner_id.required' => ' برجاء ادخال الشريك',
            'payment.required' => 'يجب ادخال الدفع الحالي',
            'date.required' => 'يجب ادخال تاريخ الدفع',
            'payment.numeric' => 'الدفع الحالي يجب ان يكون رقما ',
            'date.date' => 'تاريخ الدفع يجب ان يكون تاريخ'

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // check
        $sub= $this->getSubByTravelAndPartner($data['travel_id'],$data['partner_id']);
        if(!empty($sub))
        {
            $total = $this->getTotal($data['travel_id'],$data['partner_id']);
            $pay = $this->getPayment($data['travel_id'],$data['partner_id']);
            // get remainder
            $remainder = $total - $pay ;
            if($remainder > 0)
            {
                $data['new'] = $remainder - $data['payment'] ;
                // $new >= 0 path data
                if($data['new'] >= 0)
                {
                    // path -> Repo
                    if($this->payRepo->add($data))
                        return true;
                }


                // else Have Errors
                $this->setError('يوجد خطأ برجاء المحاوله مره اخري');
                return false;


            }
            // <0
            $this->setError('لا يمكن اضافه دفع جديد لان هذا العميل قام بالسداد بالفعل');
            return false;

        }

        // Not Found
        $this->setError('لا يوجد شئ لعرضه');
        return false;


    }
}
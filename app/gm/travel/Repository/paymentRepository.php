<?php


namespace App\gm\travel\Repository;


use App\gm\safe\Repository\safeRepository;
use App\gm\travel\Model\Payment;
use App\gm\travel\Model\Subscribe;
use Illuminate\Support\Facades\DB;

class paymentRepository
{

    public function add($data)
    {
        // get data to insert

        $payment = new Payment();

        $payment->id_travel = $data['travel_id'];
        $payment->id_partner = $data['partner_id'];
        $payment->pay_new = $data['payment'];
        $payment->date = $data['date'];
        if($payment->save()){
            // add in safe
            $safe_data =[
                'travel_id'=>$data['travel_id'],
                'payment_id'=>$payment->id,
                'partner_id'=>$data['partner_id'],
                'type'=>1,
                'cash'=>$data['payment'],
                'date'=>$payment->date
            ];

            $add_safe = new safeRepository();
            $safe = $add_safe->addNew($safe_data);
            // check if $data['new'] = 0 {{ get all Subscrib paid = 1 }}



            if($data['new']==0)
            {
                $sub = Subscribe::where([
                    ['travel_id',$data['travel_id']],
                    ['partner_id',$data['partner_id']]])
                    ->pluck('subscribe_id');

               if(DB::table('subscribe')->whereIn('subscribe_id', $sub)->update(['paid' => 1 ]))
                   return true;



               return false;
            }



            return true;
        }

        return false;


    }

}
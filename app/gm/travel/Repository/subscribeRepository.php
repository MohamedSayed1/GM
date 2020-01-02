<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 1:35 AM
 */

namespace App\gm\travel\Repository;


use App\gm\Partner_payment;
use App\gm\Repositories;
use App\gm\safe\Model\safe;
use App\gm\safe\Repository\safeRepository;
use App\gm\travel\Model\Payment;
use App\gm\travel\Model\Subscribe;
use App\gm\travel\Model\travel;
use Illuminate\Support\Facades\DB;
use Carbon;


class subscribeRepository extends Repositories
{

    use Partner_payment;
    /**
     * @return mixed
     *
     */
    public function getSubscribes(){

        return  DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select('subscribe.*','travel.travel_name','travel.start_day','partner.name')
            ->orderBy('subscribe.updated_at', 'DESC')
            ->get();
    }

    public function addNew($data)
    {
        // insert data

        $sub = new Subscribe();

        $sub->travel_id       = $data['travel_id'];
        $sub->partner_id      = $data['partner_id'];
        $sub->count_of_travel = $data['count_of_travel'];
        $sub->prices          = $data['prices'];
        $sub->type            = $data['type'];
        $sub->total           = $data['total'];
        $sub->desc             = $data['desc'];
        $sub->paid            = isset($data['paid'])?$data['paid']:0;
        $sub->current_paid    = isset($data['current_paid'])?$data['current_paid']:0;
        if($sub->save())
        {
            if($data['current_paid']!= null)
            {
                // insert data in payment table
                $payment = new Payment();
                $payment->id_travel   = $data['travel_id'];
                $payment->id_partner  = $data['partner_id'];
                $payment->pay_new     = $data['current_paid'];
                $payment->date        = Carbon\Carbon::parse(today());
                $payment->save();
                // add in safe
                $safe_data =[
                    'travel_id'=>$data['travel_id'],
                    'payment_id'=>$payment->pay_id,
                    'partner_id'=>$data['partner_id'],
                    'type'=>1,
                    'cash'=>$data['current_paid'],
                    'date'=>$payment->date
                ];

                $add_safe = new safeRepository();
                $safe = $add_safe->addNew($safe_data);

                if($this->CheckRemaider($data['travel_id'],$data['partner_id']))
                {
                    $sub = Subscribe::where([
                        ['travel_id',$data['travel_id']],
                        ['partner_id',$data['partner_id']]])
                        ->pluck('subscribe_id');

                    if(DB::table('subscribe')->whereIn('subscribe_id', $sub)->update(['paid' => 0 ]))
                        return true;

                }else{
                    $sub = Subscribe::where([
                        ['travel_id',$data['travel_id']],
                        ['partner_id',$data['partner_id']]])
                        ->pluck('subscribe_id');

                    if(DB::table('subscribe')->whereIn('subscribe_id', $sub)->update(['paid' => 1 ]))
                        return true;
                }


                return true ;
            }

            return true ;
        }
        return false ;
    }

    public function getPartnerByTravel($id =0)
    {
        return  DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select('subscribe.*','travel.travel_name','travel.start_day','partner.name')
            ->where('subscribe.travel_id',$id)
            ->get();
    }

    public function getParnterNameAndId($travel_id)
    {
        return  DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->where('subscribe.travel_id',$travel_id)
            ->pluck('partner.partner_id','partner.name');


    }

    public function getSubById($id)
    {
        return Subscribe::find($id);
    }

    public function checkCount($travel_id,$partner_id)
    {
       $sub= Subscribe::where([
            ['travel_id',$travel_id],
            ['partner_id',$partner_id]
             ])->count();

       return $sub;
    }

    public function del($id)
    {
        $sub = $this->getSubById($id);
        // del
        $pay = Payment::where([['id_travel',$sub->travel_id],['id_partner',$sub->partner_id]])->pluck('pay_id')->toArray();
        $safe = safe::where([['travel_id',$sub->travel_id],['partner_id',$sub->partner_id]])->pluck('safe_id')->toArray();
        $delsafe = safe::whereIn('safe_id',$safe)->delete();
        $delpay = Payment::whereIn('pay_id',$pay)->delete();
        if(Subscribe::where('subscribe_id',$id)->delete())
            return true;



        return false;
    }






}
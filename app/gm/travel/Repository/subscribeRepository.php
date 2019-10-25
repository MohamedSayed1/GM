<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 1:35 AM
 */

namespace App\gm\travel\Repository;


use App\gm\Repositories;
use App\gm\travel\Model\Payment;
use App\gm\travel\Model\Subscribe;
use Illuminate\Support\Facades\DB;
use Carbon;


class subscribeRepository extends Repositories
{

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






}
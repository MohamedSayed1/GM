<?php


namespace App\gm;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
trait Partner_payment{

    private $partner ;

    private $subscrib;

    public function  getTotal($travel_id,$partner_id)
    {
        $total =DB::table('subscribe')
            ->where([
                ['travel_id',$travel_id],
                ['partner_id',$partner_id],
                ])
            ->sum('total');

        return $total;
    }

    public function getPayment($travel_id,$partner_id)
    {
      return  $payment =DB::table('payment')
            ->where([
                ['id_travel',$travel_id],
                ['id_partner',$partner_id],
            ])
            ->sum('pay_new');
    }

    public function getSubByTravelAndPartner($travel_id,$partner_id)
    {
       return DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select('subscribe.*','travel.travel_name','travel.start_day','partner.name')
            ->where([
                ['subscribe.travel_id',$travel_id],
                ['subscribe.partner_id',$partner_id]
            ])
            ->first();
    }

    public function getSubBytrid($id)
    {
        return DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select(['subscribe.subscribe_id','subscribe.travel_id','subscribe.partner_id','travel.travel_name','travel.start_day','partner.name',
                DB::raw("IFNULL(sum(subscribe.total),0) as amont"),
                DB::raw("IFNULL(sum(subscribe.count_of_travel),0) as count_of_travel_new"),
                DB::raw("IFNULL(sum(subscribe.prices),0) as prices "),
            ])
            ->groupBy('partner.partner_id','subscribe.travel_id')
            ->having('subscribe.travel_id','=',$id)
            ->get();

    }

    public function getSubBypartneridAll($id)
    {
        return DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select(['subscribe.subscribe_id','subscribe.travel_id','subscribe.created_at','subscribe.partner_id','travel.travel_name','travel.start_day','partner.name',
                DB::raw("IFNULL(sum(subscribe.total),0) as amont"),
                DB::raw("IFNULL(sum(subscribe.count_of_travel),0) as count_of_travel_new"),
                DB::raw("IFNULL(sum(subscribe.prices),0) as prices "),
            ])
            ->groupBy('subscribe.partner_id','subscribe.travel_id')
            ->having('subscribe.partner_id','=',$id)
            ->whereYear('subscribe.created_at','=',Carbon::now()->year)
            ->get();

    }

    static function myPeyments($tr,$myid)
    {
        return  $payment =DB::table('payment')
            ->where([
                ['id_travel',$tr],
                ['id_partner',$myid],
            ])
            ->sum('pay_new');
    }

    static function restMoney($tr,$myid)
    {
        $mypay = self::myPeyments($tr,$myid);

         $total =DB::table('subscribe')
            ->where([
                ['travel_id',$tr],
                ['partner_id',$myid],
            ])
            ->sum('total');

         $remainder = $total - $mypay ;
         return $remainder;
    }


    // check if have remainder OR NO

    public function CheckRemaider($tr_id,$per_id)
    {
        $remaider = self::restMoney($tr_id,$per_id);

        if($remaider > 0 )
            return true;


        return false;
    }


    static function totalToTravel($id)
    {
        $total =DB::table('subscribe')
            ->where('travel_id',$id)
            ->sum('total');

        return $total;
    }

    static function TravelPaidall($id)
    {
        return  $payment =DB::table('payment')
            ->where([
                ['id_travel',$id],
            ])
            ->sum('pay_new');
    }

    static function Travelremainder($id)
    {
        $pay = self::TravelPaidall($id);

        $total = self::totalToTravel($id);

        return $rem = $total - $pay ;
    }

  




}
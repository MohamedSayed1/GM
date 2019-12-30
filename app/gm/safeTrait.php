<?php


namespace App\gm;


use Illuminate\Support\Facades\DB;

trait safeTrait
{
    private $safeRepo ;

   public function getExpensesSubscrib($travel_id,$partner_id)
   {
       // get record and total cash

       return DB::table('safe')
           ->join('travel','travel.travel_id','=','safe.travel_id')
           ->join('partner','partner.partner_id','=','safe.partner_id')
           ->select(['safe.safe_id','safe.travel_id','safe.cash','safe.date','safe.comment','safe.partner_id','travel.travel_name','travel.start_day','partner.name',
              // DB::raw("IFNULL(sum(safe.cash),0) as amont"),

           ])
            ->groupBy('safe.safe_id')
           ->where([
               ['type',2],
               ['safe.travel_id',$travel_id],
               ['safe.partner_id',$partner_id]
               ])
           ->get();

   }

   public function getExpenToRtavel($travel_id)
   {
       return DB::table('safe')
           ->join('travel','travel.travel_id','=','safe.travel_id')
           ->join('partner','partner.partner_id','=','safe.partner_id')
           ->select(['safe.safe_id','safe.travel_id','safe.comment','safe.partner_id','travel.travel_name','partner.name',
               DB::raw("IFNULL(sum(safe.cash),0) as amont"),

           ])
           ->groupBy('safe.partner_id')
           ->where([
               ['type',2],
               ['safe.travel_id',$travel_id],
           ])
           ->get();
   }

}
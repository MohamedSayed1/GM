<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 1:35 AM
 */

namespace App\gm\travel\Repository;


use App\gm\Repositories;
use App\gm\travel\Model\Subscribe;
use Illuminate\Support\Facades\DB;


class subscribeRepository extends Repositories
{
    //create new subscribe
public function addSubscribe($data){

        $subscribe=new Subscribe();
        $subscribe->travel_id = $data['travel_id'];
        $subscribe->partner_id   = $data['partner_id'];
        $subscribe->id_level   =   $data['id_level'];
        $subscribe->count_of_travel=$data['count_of_travel'];

        $subscribe->currency_id =$data['currency_id'];
        $subscribe->total = $data['total'];
        $subscribe->current_paid=$data['current_paid'];
        $subscribe->remaining_payment=$data['remaining_payment'];

        if($subscribe->save())
            return true;
        return false;
    }
   public function getSubscribeById($id){
       return  DB::table('subscribe')
           ->leftjoin('travel','travel.travel_id','=','subscribe.travel_id')
           ->leftjoin('partner','partner.partner_id','=','subscribe.partner_id')
           ->leftjoin('level_travel','level_travel.level_id','=','subscribe.id_level')
           ->leftjoin('currency_type','currency_type.currency_id','=','subscribe.currency_id')
           ->select(['subscribe.*','travel.travel_name As الرحله','partner.name As الشريك','level_travel.lavel_name As المستوى'
                          ,'currency_type.currency_name As العمله'])
           ->where('subscribe_id','=',$id)

           ->first();
   }

    /**
     * @return mixed
     */
    public function getSubscribes(){

        return  DB::table('subscribe')
            ->join('travel','travel.travel_id','=','subscribe.travel_id')
            ->join('partner','partner.partner_id','=','subscribe.partner_id')
            ->select('subscribe.*','travel.travel_name','partner.name')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }





}
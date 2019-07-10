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




}
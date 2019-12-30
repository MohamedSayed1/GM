<?php


namespace App\gm\safe\Repository;


use App\gm\safe\Model\safe;
use Carbon\Carbon;

class safeRepository
{
    // add new safe

    public function addNew($data)
    {
        $safe = new safe();

        $safe->travel_id  = $data['travel_id'];
        $safe->coust_id   = isset($data['coust_id'])?$data['coust_id']:null;
        $safe->payment_id = isset($data['payment_id'])?$data['payment_id']:null;
        $safe->partner_id = isset($data['partner_id'])?$data['partner_id']:null;
        $safe->supp_id    = isset($data['supp_id'])?$data['supp_id']:null;
        $safe->type       = $data['type'];
        $safe->cash       = $data['cash'];
        $safe->date       = isset($data['date'])?$data['date']:Carbon::today();

        return $safe->save();
    }

    public function getSumpartner($partner_id ,$travel_id )
    {
        return safe::where([
            ['travel_id',$travel_id],
            ['partner_id',$partner_id],
            ['type',2]
        ])->sum('cash');
    }

    // Search


}
<?php

namespace App\gm\cost\Repository;

use App\gm\cost\Model\Cost;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class CostRepository
{

    public function store()
    {

    }

    public function getAll()
    {

        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->select('costs.*', 'travel.travel_name')
            ->orderBy('costs.created_at', 'DESC')
            ->get();

    }

    public function addCost($data)
    {

        // insert data

        $cost = new Cost();

        $cost->travel_id = $data['travel_id'];
        $cost->name_costs = $data['name_costs'];
        $cost->unit_price = $data['unit_price'];
        $cost->count = $data['count'];
        $cost->pound = $data['pound'];
        $cost->total = $data['total'];
        if ($cost->save()) {
            return true;
        }
        return false;
    }

    public function updateCost($data)
    {
        $costU = Cost::find($data['costs_id']);

        $costU->travel_id = $data['travel_id'];
        $costU->name_costs = $data['name_costs'];
        $costU->unit_price = $data['unit_price'];
        $costU->count = $data['count'];
        $costU->pound = $data['pound'];
        $costU->total = $data['total'];
        if ($costU->save()) {
            return true;
        }
        return false;
    }

    public function getCostById($id)
    {

        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->where('costs.costs_id', $id)
            ->get();


    }

    public function getCostsToTravelByTravelID($id)
    {

        return $totalCost = DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->select('costs.*', 'travel.travel_name')
            ->where('costs.travel_id', '=', $id)
            ->orderBy('costs.created_at', 'DESC')
            ->get();



    }


}

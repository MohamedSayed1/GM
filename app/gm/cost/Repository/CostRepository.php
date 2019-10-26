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
        if ($data['type'] == 0) {
            $cost->travel_id = $data['travel_id'];
            $cost->name_costs = $data['name_costs'];
            $cost->type = $data['type'];
            $cost->unit_price = $data['unit_price'];
            $cost->count = $data['count'];
            $cost->pound = $data['pound'];
            $cost->total = $data['total'];
        } elseif ($data['type'] == 1) {
            $cost->travel_id = $data['travel_id'];
            $cost->name_costs = $data['name_costs'];
            $cost->type = $data['type'];
            $cost->unit_price = $data['unit_price'];
            $cost->night_number = $data['night_number'];
            $cost->room_num = $data['room_num'];
            $cost->pound = $data['pound'];
            $cost->total = $data['total'];
        }

        if ($cost->save()) {
            return true;
        } else
            return false;
    }

    public function updateCost($data)
    {
        $costU = Cost::find($data['costs_id']);

        if ($data['type'] == 0) {
            $costU->travel_id = $data['travel_id'];
            $costU->name_costs = $data['name_costs'];
            $costU->type = $data['type'];
            $costU->unit_price = $data['unit_price'];
            $costU->count = $data['count'];
            $costU->pound = $data['pound'];
            $costU->total = $data['total'];
        } elseif ($data['type'] == 1) {
            $costU->travel_id = $data['travel_id'];
            $costU->name_costs = $data['name_costs'];
            $costU->type = $data['type'];
            $costU->unit_price = $data['unit_price'];
            $costU->night_number = $data['night_number'];
            $costU->room_num = $data['room_num'];
            $costU->pound = $data['pound'];
            $costU->total = $data['total'];
        }

        if ($costU->save()) {
            return true;
        }
        return false;
    }

    public function getCostById($id)
    {
        $f=Cost::findORFail($id);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->where('costs.costs_id', $id)
            ->get();


    }
    public function getCostByType($type,$travelID){
        $cost=Cost::findOrFail($travelID);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->where('costs.travel_id',$travelID)->where('costs.type', $type)
            ->get();

    }

    public function  getCostByTypeHotelAndTravel($type,$travelID){
        $cost=Cost::findOrFail($travelID);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->select('costs.name_costs','costs.unit_price','costs.pound','costs.night_number','costs.room_num','costs.total','travel.travel_name')
            ->where('costs.travel_id',$travelID)->where('costs.type', $type)
            ->get();

    }
    public function getCostByTypeNormalAndTravel($type,$travelID){
        $cost=Cost::findOrFail($travelID);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->select('costs.name_costs','costs.unit_price','costs.pound','costs.count','costs.total','travel.travel_name')
            ->where('costs.travel_id',$travelID)->where('costs.type', $type)
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

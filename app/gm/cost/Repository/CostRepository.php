<?php

namespace App\gm\cost\Repository;

use App\gm\cost\Model\Cost;
use App\gm\safe\Model\safe;
use App\gm\safe\Repository\safeRepository;
use App\gm\travel\Model\travel;
use Carbon\Carbon;
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
        if ($data['t_type'] == 0) {
            $cost->travel_id = $data['travel_id'];
            $cost->supplier_id = $data['supplier_id'];
            $cost->name_costs = $data['name_costs'];
            $cost->type = $data['t_type'];
            $cost->unit_price = $data['unit_price'];
            $cost->count = $data['count'];
            $cost->pound = $data['pound'];
            $cost->total = $data['total'];
        } elseif ($data['t_type'] == 1) {
            $cost->travel_id = $data['travel_id'];
            $cost->supplier_id = $data['supplier_id'];
            $cost->name_costs = $data['name_costs'];
            $cost->type = $data['t_type'];
            $cost->unit_price = $data['unit_price'];
            $cost->night_number = $data['night_number'];
            $cost->room_num = $data['room_num'];
            $cost->pound = $data['pound'];
            $cost->total = $data['total'];
        }

        if ($cost->save()) {
            $lastIdCost = $cost->costs_id;

            //insert into safe table
            $add_To_safe = new safeRepository();
            $data['coust_id'] = $lastIdCost;
            $data['cash'] = isset($data['total']) ? $data['total'] : null;
            $data['type'] = 2;

            $add_To_safe->addNew($data);

            return true;
        } else
            return false;


    }

    public function updateCost($data)
    {
        $costU = Cost::find($data['costs_id']);

        if ($data['t_type'] == 0) {
            $costU->travel_id = $data['travel_id'];
            $costU->supplier_id = $data['supplier_id'];
            $costU->name_costs = $data['name_costs'];
            $costU->type = $data['t_type'];
            $costU->unit_price = $data['unit_price'];
            $costU->count = $data['count'];
            $costU->pound = $data['pound'];
            $costU->total = $data['total'];
        } elseif ($data['t_type'] == 1) {
            $costU->travel_id = $data['travel_id'];
            $costU->supplier_id = $data['supplier_id'];
            $costU->name_costs = $data['name_costs'];
            $costU->type = $data['t_type'];
            $costU->unit_price = $data['unit_price'];
            $costU->night_number = $data['night_number'];
            $costU->room_num = $data['room_num'];
            $costU->pound = $data['pound'];
            $costU->total = $data['total'];
        }

        if ($costU->save()) {


            //insert into safe table
            $id = $data['costs_id'];

            $date['coust_id'] = $id;

            $data['cash'] = isset($data['total']) ? $data['total'] : null;
            $data['type'] = 2;
            $this->updateIntoSafeTableByCostId($data);
            return true;
        }
        return false;
    }

 //check if id of cost exist in safe table
    public function getSafeByCostId($cost_id)
    {
        $h = new safe();
        $g = $h->where('coust_id', $cost_id)->get();
        if (count($g) > 0) {
            return $g[0];
        } else
            return false;

    }
   //update row of table if cost updated
    public function updateIntoSafeTableByCostId($data)
    {
        $cost_id = $data['costs_id'];

        if ($getRowByCostId = $this->getSafeByCostId($cost_id)) {

            $safeId = $getRowByCostId->safe_id;

            if ($safeId) {
                $updateSafeRow = safe::findOrFail($safeId);
                $updateSafeRow->travel_id = $data['travel_id'];

                $updateSafeRow->supp_id = isset($data['supplier_id']) ? $data['supplier_id'] : null;
                $updateSafeRow->type = $data['type'];
                $updateSafeRow->cash = $data['cash'];
                $updateSafeRow->date = isset($data['date']) ? $data['date'] : Carbon::today();

                return $updateSafeRow->save();
            } else
                return false;
        }
    }

    public function getCostById($id)
    {
        $f = Cost::findOrFail($id);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->join('suppliers','suppliers.su_id','=','costs.supplier_id')
            ->where('costs.costs_id', $id)
            ->get();


    }

    public function getCostByType($type, $travelID)
    {
        $cost = Cost::findOrFail($travelID);

        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->where('costs.travel_id', $travelID)->where('costs.type', $type)
            ->get();

    }

    public function getCostByTypeHotelAndTravel($type, $travelID)
    {
        $cost = travel::findOrFail($travelID);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->join('suppliers','suppliers.su_id','=','costs.supplier_id')
            ->select('costs.name_costs', 'costs.unit_price', 'costs.pound','suppliers.su_name', 'costs.night_number', 'costs.room_num', 'costs.total', 'travel.travel_name')
            ->where('costs.travel_id', $travelID)->where('costs.type', $type)
            ->get();

    }

    public function getCostByTypeNormalAndTravel($type, $travelID)
    {
        $cost = Cost::findOrFail($travelID);
        return DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->join('suppliers','suppliers.su_id','=','costs.supplier_id')
            ->select('costs.name_costs', 'costs.unit_price', 'costs.pound','suppliers.su_name', 'costs.count', 'costs.total', 'travel.travel_name')
            ->where('costs.travel_id', $travelID)->where('costs.type', $type)
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
    public function del($id)
    {

        $cost = Cost::findOrFail($id);
        // delete

        $safe = safe::where('coust_id',$cost->costs_id)->pluck('safe_id')->toArray();
        $deleteSafe = safe::whereIn('safe_id',$safe)->delete();

        if(Cost::where('costs_id',$id)->delete())
            return true;
        
        return false;

    }




}

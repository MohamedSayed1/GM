<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/9/2019
 * Time: 5:22 AM
 */

namespace App\gm\travel\Repository;


use App\gm\Repositories;
use App\gm\travel\Model\travel;
use Illuminate\Support\Facades\DB;

class TravelRepository extends Repositories
{
    public function addTravel($data)
    {
        $travel = new travel();
        $travel->travel_name = $data['travel_name'];
        $travel->start_day = $data['start_day'];
        $travel->end_day = $data['end_day'];
        $travel->transportaion = $data['transportaion'];
        $travel->hotel_name = $data['hotel_name'];
        $travel->is_active = $data['is_active'];
        if ($travel->save())
            return true;
        return false;
    }

    public function updateTravel($data)
    {
        $travel = travel::find($data['travel_id']);
        $travel->travel_name = $data['travel_name'];
        $travel->start_day = $data['start_day'];
        $travel->end_day = $data['end_day'];
        $travel->transportaion = $data['transportaion'];
        $travel->hotel_name = $data['hotel_name'];
        $travel->is_active = $data['is_active'];
        if ($travel->save())
            return true;
        return false;
    }

    public function getTravels()
    {
        return travel::orderBy('travel_id', 'DECS')->get();
    }

    public function getTravelById($id)
    {
        return Travel::find($id);
    }

    public function countOfTravels()
    {
        $travel = Travel::count();
        if (!$travel)
            return false;
        return $travel;
    }

    public function deleteTravel($id)
    {
        $travel = Travel::find($id);
        if (!$travel)
            return false;
        $travel->delete();
        return true;
    }

    public function UpdateActive($id, $status)
    {
        $travel = Travel::find($id);
        $travel->is_active = $status;
        if ($travel->save())
            return true;
        return false;

    }

    public function searchCourses($key)
    {
        $travel = DB::table('travel')
            ->select('travel.*')
            ->where('travel.travel_name', 'like', '%' . $key['search'] . '%')
            ->get();
        if ($travel)
            return $travel;
        return false;
    }

}

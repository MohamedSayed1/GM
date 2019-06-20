<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 2/24/2019
 * Time: 11:09 PM
 */

namespace App\gm\travel\Repository;


use App\gm\travel\Model\Level_Travel;

class LevelTravelRepository
{
    // add new
    public function AddNew($levelData)
    {
        $level = new Level_Travel();

        $level->lavel_name = $levelData['name'];

        return $level->save();
    }

    // updated

    public function Updated($levelData)
    {
        $level = Level_Travel::find($levelData['id']);

        $level->lavel_name = $levelData['name'];

        return $level->save();
    }

    // get by id
    public function GetLevelByid($id)
    {
        return Level_Travel::find($id);
    }

    // get all Desc :)
    public function GetLevelAll()
    {
        return Level_Travel::orderBy('updated_at', 'DESC')->get();
    }


}
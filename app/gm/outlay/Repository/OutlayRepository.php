<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 5/7/2019
 * Time: 4:25 PM
 */

namespace App\gm\outlay\Repository;


use App\gm\outlay\Model\Outlay;

class OutlayRepository
{
    // add
    public function addNew($data)
    {
        $outlay = new Outlay();

        $outlay->outlay_name = $data['name'];
        $outlay->value       = $data['value'];
        $outlay->count       = $data['count'];
        $outlay->total       = $data['total'];
        $outlay->date        = $data['date'];

        return $outlay->save();
    }

    // updated

    public function updated($data)
    {
        $outlay = Outlay::find($data['id']);

        $outlay->outlay_name = $data['name'];
        $outlay->value       = $data['value'];
        $outlay->count       = $data['count'];
        $outlay->total       = $data['total'];
        $outlay->date        = $data['date'];

        return $outlay->save();
    }

    // get

    public function getOulays()
    {
        return $outlay = Outlay::orderBy('updated_at', 'DESC')->get();
    }

    // get by id
    public function getOulay($id)
    {
        return $outlay = Outlay::find($id);
    }

    // get by Data ( From To )

    public function getByData($from,$to)
    {
        return $outlay = Outlay::whereBetween('date',[$from,$to])->orderBy('updated_at', 'DESC')->get();
    }

    // del

    public function del($id)
    {
          if(Outlay::where('outlay_id',$id)->delete())
              return true;


          return false;
    }

}
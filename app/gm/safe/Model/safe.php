<?php


namespace App\gm\safe\Model;


use Illuminate\Database\Eloquent\Model;

class safe extends Model
{
    protected $table ='safe';
    protected $primaryKey ='safe_id';

    public function parnter_get()
    {
        return $this->belongsTo('App\gm\travel\Model\Partner', 'partner_id', 'partner_id');
    }

    public function getTravel()
    {
        return $this->belongsTo('App\gm\travel\Model\travel', 'travel_id', 'travel_id');
    }

    public function getCost()
    {
        return $this->belongsTo('App\gm\cost\Model\Cost', 'coust_id','costs_id');
    }


}
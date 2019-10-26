<?php

namespace App\gm\cost\Model;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable=[
    	 'travel_id','name_costs', 'unit_price', 'count', 'pound', 'total','type','night_number','room_num'
    ];

    protected $primaryKey='costs_id';
}

<?php

namespace App\gm\cost\Model;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable=[
    	'costs_id', 'travel_id', 'unit_price', 'count', 'pound', 'total'
    ];

    protected $primaryKey='costs_id';
}

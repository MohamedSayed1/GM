<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 2/24/2019
 * Time: 12:07 AM
 */

namespace App\gm\cost\Model;


use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey ='su_id';
}
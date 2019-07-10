<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 5/9/2019
 * Time: 12:02 AM
 */

namespace App\Http\Controllers;


use App\gm\travel\Model\Subscribe;
use App\gm\users\Repository\UserRepository;

class test extends Controller
{
    public function add()
    {
     $x=[
           'username'=>'admin',
         'password'=>123456,
         'name'=>'adminddd'

         ];
        $m=new UserRepository();
        $m->AddNew($x);


    }

}
<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 3/11/2019
 * Time: 10:58 PM
 */

namespace App\gm\users\Services;


use App\gm\Services;
use App\gm\users\Repository\UserRepository;

class UserServices extends Services
{
    // connected with Repo

    private $userRepo ;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }


    public function getAllUsers()
    {
        return $this->userRepo->GetAll();
    }










}
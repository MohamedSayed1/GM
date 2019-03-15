<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 3/13/2019
 * Time: 12:26 AM
 */

namespace App\Http\Controllers;


use App\gm\users\Services\UserServices;

class adminUsersController extends Controller
{
    // connected with User Serivice

    private $userServices ;

    public function __construct()
    {
        $this->userServices = new UserServices();
    }

    public function viewUser()
    {
        $users = $this->userServices->getAllUsers();

        return view('admin.user.index')
            ->with('users',$users)
            ->with('title','إداره المستخدمين');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: msayed
 * Date: 2/24/2019
 * Time: 11:42 PM
 */

namespace App\gm\users\Repository;


use App\User;
use Illuminate\Support\Facades\DB;


class UserRepository
{
    // add new
    public function AddNew($userData)
    {
        $users = new User();

        $users->username    = $userData['username'];
        $users->password    = bcrypt($userData['password']);
        $users->name        = $userData['name'];
        $users->name        = $userData['name'];
        $users->is_actvie   = isset($userData['is_active'])?$userData['is_active']:1;
        $users->group_id    = isset($userData['group_id'])?$userData['group_id']:2;

        return $users->save();
    }

    // updated
    public function UpdatedUser($userData)
    {
        $users = User::find($userData['id']);

        $users->username    = $userData['username'];
        $users->name        = $userData['name'];
        $users->name        = $userData['name'];
        $users->is_actvie   = $userData['is_active'];
        $users->group_id    = $userData['group_id'];

        return $users->save();

    }

    // updated status
    public function UpdatedStatus($data)
    {
        $users = User::find($data['id']);
        $users->is_actvie   = $data['is_actvie'];
        return $users->save();
    }

    // updated password
    public function UpdatedPassword($data)
    {
        $users = User::find($data['id']);
        $users->password    = bcrypt($data['password']);
        return $users->save();
    }

    // get all
    public function GetAll()
    {
        return $users = DB::table('user')
            ->Join('user_group','user_group.group_id','user.group_id')
            ->select('user.*','user_group.group_name')
            ->orderBy('user.updated_at','desc')
            ->get();
    }

    // get by id
    public function GetById($id)
    {
        return $users = DB::table('user')
        ->Join('user_group','user_group.group_id','user.group_id')
        ->select('user.*','user_group.group_name')
        ->where('user.id',$id)
        ->first();
    }

    // get by group id
    public function getByGroupId($id)
    {
        return $users = DB::table('user')
            ->Join('user_group','user_group.group_id','user.group_id')
            ->select('user.*','user_group.group_name')
            ->where('user.group_id',$id)
            ->orderBy('user.updated_at','desc')
            ->get();
    }
}
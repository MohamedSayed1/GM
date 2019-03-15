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
use Validator;

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

    public function getuserByid($id)
    {
        return $this->userRepo->GetById($id);
    }
    public function addNewUser($data)
    {
        $rules = [
            'username'         =>'required|unique:user|min:2|max:249',
            'password'         =>'required|min:3|max:249',
            'name'             =>'required|min:2|max:249',
            'group_id'         =>'required',


        ];

        $messages = [
            'username.required'=>' برجاء ادخال اسم الدخول',
            'username.unique'=>'اسم الدخول موجود بالفعل برجاء اختيار اسم اخر',
            'username.min'=>'يجب  ان يكون اسم الدخل اكتر من 2 حرف',
            'username.max'=>'يجب ان يكون اسم الدخل اقل من 492 حرف',
            'password.max'=>'كلمه المرور يجب ان تكون اقل من 249',
            'password.min'=>'يجب ان تكون كلمه المرور تحتوي علي عدد حروف اكثر من 4',
            'password.required'=>'برجاء ادخال كلمه المرور ',
            'name.required'=>'برجاء ادخال اسم المستخدم ',
            'name.min'=>'يجب ان يكون اسم المستخدم اكبر من حرفين',
            'name.max'=>'يجب ان يكون اسم المستخدم اقل من 249',

              ];

        // vaild
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set erros
            $this->setError($validator->errors()->all());
            return false;
        }

        // insert data

        if($this->userRepo->AddNew($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }

    public function updated($data)
    {
        $rules = [
            'username'         =>'required|min:1|max:249|unique:user,username,'.$data['id'],
            'name'             =>'required|min:3|max:249',
            'is_active'        =>'required',
            'group_id'         =>'required',

        ];
        $messages = [
            'username.required'=>' برجاء ادخال اسم الدخول',
            'username.unique'=>'اسم الدخول موجود بالفعل برجاء اختيار اسم اخر',
            'username.min'=>'يجب  ان يكون اسم الدخل اكتر من 2 حرف',
            'username.max'=>'يجب ان يكون اسم الدخل اقل من 492 حرف',
            'password.max'=>'كلمه المرور يجب ان تكون اقل من 249',
            'password.min'=>'يجب ان تكون كلمه المرور تحتوي علي عدد حروف اكثر من 4',
            'password.required'=>'برجاء ادخال كلمه المرور ',
            'name.required'=>'برجاء ادخال اسم المستخدم ',
            'name.min'=>'يجب ان يكون اسم المستخدم اكبر من حرفين',
            'name.max'=>'يجب ان يكون اسم المستخدم اقل من 249',

        ];

        // vaild
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set erros
            $this->setError($validator->errors()->all());
            return false;
        }

        // insert data

        if($this->userRepo->updatedUser($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }



    public function updatedPassw($data)
    {
        $rules = [
            'id'               =>'required',
            'password'         =>'required|min:3|max:249'

        ];

        $messages = [
            'password.max'=>'كلمه المرور يجب ان تكون اقل من 249',
            'password.min'=>'يجب ان تكون كلمه المرور تحتوي علي عدد حروف اكثر من 4',
            'password.required'=>'برجاء ادخال كلمه المرور ',
        ];

        // vaild
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set erros
            $this->setError($validator->errors()->all());
            return false;
        }

        // insert data

        if($this->userRepo->updatedPassword($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }




}
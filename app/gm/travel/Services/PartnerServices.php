<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 4/8/2019
 * Time: 12:22 AM
 */

namespace App\gm\travel\Services;


use App\gm\Services;
use App\gm\travel\Repository\PartnerRepository;
use Validator;

class PartnerServices extends Services
{
    // conn with Repo

    private $partnerRepo;

    public function __construct()
    {
        $this->partnerRepo = new PartnerRepository();
    }

    public function getAll()
    {
        return $this->partnerRepo->GetAllPartner();
    }

    public function addNew($data)
    {
        $rules = [
            'name'               =>'required|min:3|max:249',
            'phone'             =>'required|digits:11'

        ];

        $messages = [
            'name.required'=>'برجاء ادخال اسم العميل',
            'name.max'=>'اسم العميل يجب ان يكون اقل من 249',
            'password.min'=>'يجب ان لا يقل اسم العميل علي 3 احرف',
            'phone.required'=>'برجاء ادخال رقم تلفون العميل',
            'phone.digits'=>'يجب ان يكون رقم التلفون 11 رقم',
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

        if($this->partnerRepo->AddNewPartner($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }


}
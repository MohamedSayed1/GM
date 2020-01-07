<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 4/8/2019
 * Time: 12:22 AM
 */

namespace App\gm\cost\Service;


use App\gm\cost\Repository\SupplierRepository;
use App\gm\Services;


use Validator;

class SuppliersServices extends Services
{
    // conn with Repo

    private $supplierRep;

    public function __construct()
    {
        $this->supplierRep = new SupplierRepository();
    }

    public function getByid($id)
    {
        return $this->supplierRep->getByid($id);
    }

    public function GetAllSuppliers()
    {
        return $this->supplierRep->GetAllSuppliers();
    }

    public function addNew($data)
    {
        $rules = [
            'su_name'               =>'required|min:3|max:249',
            'su_phone'              =>'required|unique:suppliers|digits:11'

        ];

        $messages = [
            'su_name.required'=>'برجاء ادخال اسم المورد',
            'su_name.max'=>'اسم المورد يجب ان يكون اقل من 249',
            'su_name.min'=>'يجب ان لا يقل اسم المورد علي 3 احرف',
            'su_phone.required'=>'برجاء ادخال رقم تلفون المورد',
            'su_phone.digits'=>'يجب ان يكون رقم التلفون 11 رقم',
            'su_phone.unique'=>'هذا الرقم موجود بالفعل',
        ];

        // valid
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set errors
            $this->setError($validator->errors()->all());
            return false;
        }

        // insert data

        if($this->supplierRep->AddNewPartner($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }
    public function updated($data)
    {
        $rules = [
            'su_name'               =>'required|min:3|max:249',
            'su_phone'              =>'required|digits:11|unique:suppliers,su_phone,'.$data['su_id'].',su_id',

        ];

        $messages = [
            'su_name.required'=>'برجاء ادخال اسم المورد',
            'su_name.max'=>'اسم المورد يجب ان يكون اقل من 249',
            'su_phone.min'=>'يجب ان لا يقل اسم المورد علي 3 احرف',
            'su_phone.required'=>'برجاء ادخال رقم تلفون المورد',
            'su_phone.digits'=>'يجب ان يكون رقم التلفون 11 رقم',
            'su_phone.unique'=>'هذا الرقم موجود بالفعل',
        ];

        // valid
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set errors
            $this->setError($validator->errors()->all());
            return false;
        }

        // insert data

        if($this->supplierRep->UpdatedSupplier($data))
            return true;


        // set errors
        $this->setError('Error Saving to database');
        return false;
    }


}
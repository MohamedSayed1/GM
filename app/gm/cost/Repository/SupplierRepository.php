<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 2/24/2019
 * Time: 11:18 PM
 */

namespace App\gm\cost\Repository;


use App\gm\cost\Model\Supplier;
use App\gm\travel\Model\Partner;

class SupplierRepository
{
    // add new
    public function AddNewPartner($partnerData)
    {
        $supplier = new Supplier();

        $supplier->su_name     = $partnerData['su_name'];
        $supplier->su_phone    = $partnerData['su_phone'];

        return $supplier->save();
    }


    // updated
    public function UpdatedSupplier($supplierData)
    {
        $supplier= Supplier::findOrFail($supplierData['su_id']);

        $supplier->su_name     = $supplierData['su_name'];
        $supplier->su_phone    = $supplierData['su_phone'];

        return $supplier->save();

    }

    // get all
    public function GetAllSuppliers()
    {
        return Supplier::orderBy('updated_at', 'DESC')->get();
    }

    // get by id
    public function getByid($id)
    {
        return Supplier::findOrFail($id);
    }



}
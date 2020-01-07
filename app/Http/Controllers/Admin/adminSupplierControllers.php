<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 4/8/2019
 * Time: 12:24 AM
 */

namespace App\Http\Controllers\Admin;


use App\gm\cost\Service\SuppliersServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminSupplierControllers extends Controller
{
    // conn with services

    private $supplierSer;

    public function __construct()
    {
        $this->supplierSer = new SuppliersServices();
    }

    public function viewPartner()
    {
        $supplier = $this->supplierSer->GetAllSuppliers();

        return view('admin.supplier.index')
            ->with('partner', $supplier)
            ->with('title', 'الاراضي المقدسه | الموردين');
    }

    public function addSupplier()
    {
        return view('admin.supplier.add')->with('title', 'الاراضي المقدسه | اضافه عميل جديد');
    }



    public function processAdd(Request $request)
    {
        $data = $request->all();

        if ($this->supplierSer->addNew($data)) {
            alert()->success('تم الاضافه ');
            return redirect('dashboard/admin/supplier/view');
        }


        $errors = $this->supplierSer->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

    public function updated($id)
    {
        // check if found

        $supplier = $this->supplierSer->getByid($id);

        if (!empty($supplier)) {
            // found Data

            return view('admin.supplier.update')
                ->with('supplier', $supplier)
                ->with('title', 'الاراضي المقدسه || تعديل المورد');
        }


        return redirect()
            ->back()
            ->with('$errors', 'برجاء تحديد عميل موجود بالفعل');

    }

    public function UpdatedProcess(Request $request)
    {
        $data = $request->all();

        if ($this->supplierSer->updated($data)) {
            alert()->success('تم التعديل ');
            return redirect('dashboard/admin/supplier/view');
        }


        $errors = $this->supplierSer->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }


}
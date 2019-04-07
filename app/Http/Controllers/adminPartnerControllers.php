<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 4/8/2019
 * Time: 12:24 AM
 */

namespace App\Http\Controllers;


use App\gm\travel\Services\PartnerServices;
use Illuminate\Http\Request;

class adminPartnerControllers extends Controller
{
    // conn with services

    private $partnerSer;

    public function __construct()
    {
        $this->partnerSer = new PartnerServices();
    }

    public function viewPartner()
    {
        $partner = $this->partnerSer->getAll();

        return view('admin.partner.index')
            ->with('partner',$partner)
            ->with('title','الاراضي المقدسه | العملاء');
    }

    public function addPartner()
    {
        return view('admin.partner.add')->with('title','الاراضي المقدسه | اضافه عميل جديد');
    }

    public function processAdd(Request $request)
    {
        $data = $request->all();

        if($this->partnerSer->addNew($data))

            return redirect('dashboard/admin/partner/view')
                ->with('$massage','تم بنجاح اضافه عميل');



        $errors = $this->partnerSer->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }


}
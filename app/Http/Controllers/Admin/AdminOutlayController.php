<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 5/7/2019
 * Time: 5:03 PM
 */

namespace App\Http\Controllers\Admin;


use App\gm\outlay\Services\OutlayServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOutlayController extends Controller
{
    // connected with Outlay Services
    private $outayServices;

    public function __construct()
    {
        $this->outayServices = new OutlayServices();
    }

    // view & outlays Data
    public function index()
    {
        $outlays = $this->outayServices->getAll();

        return view('admin.outlay.index')
            ->with('outlays',$outlays)
            ->with('title','الاراضي المقدسه | مصاريف الشركه');
    }

    // add new Porcess
    public function addProcess(Request $request)
    {
        $data = $request->all();
        if($this->outayServices->add($data))
        {
            alert()->success('تم الامر');
            return redirect('dashboard/admin/outlay/view');
        }

        $errors = $this->outayServices->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

    public function SeacherDate(Request $request)
    {
        $date = $request->all();

        $outlays = $this->outayServices->Search($date);

        return view('admin.outlay.index')
            ->with('outlays',$outlays)
            ->with('title','الاراضي المقدسه | مصاريف الشركه');
    }

    public function Deleted($id)
    {
        if ($this->outayServices->del($id))
        {
            alert()->success('تم الامر');
            return redirect('dashboard/admin/outlay/view');
        }

        $errors = $this->outayServices->errors();
        return redirect()
            ->back()
            ->withErrors($errors);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     *  updated ( view & Process )
     */
    public function updated($id)
    {
        if($outliy=$this->outayServices->getByID($id))
        {
            return view('admin.outlay.updated')
                ->with('title','الاراضي المقدسه | تعديل مصاريف الشركه')
                ->with('outliy',$outliy);
    }

        $errors = $this->outayServices->errors();
        return redirect()
            ->back()
            ->withErrors($errors);
    }

    public function updatedProcess(Request $request)
    {
        $data = $request->all();
        if($this->outayServices->updated($data))
        {
            alert()->success('تم التعديل ');
            return redirect('dashboard/admin/outlay/view');
        }

        $errors = $this->outayServices->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }



}
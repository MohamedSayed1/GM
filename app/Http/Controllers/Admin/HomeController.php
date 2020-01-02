<?php


namespace App\Http\Controllers\Admin;


use App\gm\safe\Model\safe;
use App\gm\travel\Model\Partner;
use App\gm\travel\Model\travel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $travels = travel::orderBy('updated_at',' DESC')->get();
        $partners = Partner::orderBy('updated_at',' DESC')->get();
        $supps    = DB::table('suppliers')->orderBy('updated_at',' DESC')->get();
        return view('admin.index')
            ->with('travels',$travels)
            ->with('supps',$supps)
            ->with('partners',$partners);
    }

    public function searchProcess(Request $request)
    {

        $pertner = $request->get('partner');
        $type = $request->get('type');
        $travel = $request->get('travel');
        $supp = $request->get('supp');
        $from = $request->get('from');
        $to = $request->get('to');


         $results = safe::with('parnter_get','getCost')
            ->when($pertner, function ($q) use ($pertner) {
              return  $q->where('partner_id', $pertner);
            })
            ->when($type, function ($q) use ($type) {
              return  $q->where('type', $type);
            })
            ->when($travel, function ($q) use ($travel) {
               return $q->where('travel_id', $travel);
            })
            ->when($supp, function ($q) use ($supp) {
               return $q->where('supp_id', $supp);
            })
            ->when($from, function ($q) use ($from, $to) {
               return $q->where('date', '>=', $from)
                    ->orwhere('date', '<=', $to);
            })->get();


        $travels = travel::orderBy('updated_at',' DESC')->get();
        $partners = Partner::orderBy('updated_at',' DESC')->get();
        $supps    = DB::table('suppliers')->orderBy('updated_at',' DESC')->get();
        return view('admin.index')
            ->with('travels',$travels)
            ->with('supps',$supps)
            ->with('results',$results)
            ->with('partners',$partners);



    }


}
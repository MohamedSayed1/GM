<?php


namespace App\Http\Controllers\Admin\Sub;


use App\gm\travel\Services\PartnerServices;
use App\gm\travel\Services\subscribeServices;
use App\gm\travel\Services\TravelServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribeControllers extends Controller
{
    // Connected With Subscribe

    private $subSer;
    private $travSer;
    private $parSer;

    public function __construct()
    {
        // connected with Subscribe
        $this->subSer = new subscribeServices();
        // connected with Travel
        $this->travSer = new TravelServices();
        // connected with Partner
        $this->parSer = new PartnerServices();
    }

    /**
     * @return mixed
     *  View index
     */

    public function index()
    {
        // get all subscribe
        $subscribe = $this->subSer->getSubscribes();

        // get all Travel

        $travels = $this->travSer->getTravels();

        // get all Partner

        $partners = $this->parSer->getAll();

        return view('admin.subscribe.index')
            ->with('title', 'تفاصيل الرحلة بالمناديب')
            ->with('subscribe', $subscribe)
            ->with('travels', $travels)
            ->with('partners', $partners);
    }

    public function pranterAccount(Request $request)
    {
        return $request->all();
    }

    public function addNewSub(Request $request)
    {
        $data = $request->all();

         if($this->subSer->addSubscribe($data))
         {
             alert()->success('تم الاضافه بنجاح ');
             return redirect('dashboard/admin/travels/subscribe/index');

         }

        $errors = $this->subSer->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }

    // get partner By Travel -> id (( used to Selected Option in index

    public function getTravelByTravelID($id)
    {
       $travel = $this->subSer->getParnterNameAndId($id);
        if(count($travel)!=0)
        {

            return response()->json($travel);
        }
        return response()->json($travel);
    }


}
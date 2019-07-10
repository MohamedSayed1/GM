<?php


namespace App\Http\Controllers\Admin\Sub;


use App\gm\travel\Services\subscribeServices;
use App\Http\Controllers\Controller;

class SubscribeControllers extends Controller
{
    // Connected With Subscribe

    private $subSer;

    public function __construct()
    {
        $this->subSer = new subscribeServices();
    }

    public function index()
    {
        $subscribe = $this->subSer->getSubscribes();

        return view('admin.subscribe.index')
            ->with('title', 'تفاصيل الرحلة بالمناديب')
            ->with('subscribe', $subscribe);
    }

}
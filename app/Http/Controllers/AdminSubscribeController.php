<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/11/2019
 * Time: 2:18 AM
 */

namespace App\Http\Controllers;


use App\gm\travel\Model\Currency_type;
use App\gm\travel\Repository\LevelTravelRepository;
use App\gm\travel\Repository\PartnerRepository;
use App\gm\travel\Services\subscribeServices;
use App\gm\travel\Services\TravelServices;
use Illuminate\Http\Request;

class adminSubscribeController extends Controller
{
  private $subscribeService;

  public function __construct()
  {
      $this->subscribeService=new subscribeServices();
  }

       //create new subscribe
    /**
     * @return mixed
     */
  public function AddSubscribe(){
      //all travel
      $travel=new TravelServices();
      $travels=$travel->getTravels();
      //all partner
      $partner=new PartnerRepository();
      $partners=$partner->GetAllPartner();
      //all level
      $level=new LevelTravelRepository();
      $levels=$level->GetLevelAll();
      //all type of cost
      $costTypes=Currency_type::all();
      //all currencies


      return view('admin.subscribe.addSubscribe')
              ->with('travel',$travels)
               ->with('partner',$partners)
                ->with('level',$levels)
                 ->with('costType',$costTypes)
                   ->with('title','اضافة حالة شريك');

  }
                 //insert into database

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
      public  function processAddSubscribe(Request $request){
        if($this->subscribeService->addSubscribe($request))
            return redirect()->back()
                ->with('$massage', 'تم اضافه  بنجاح');

        $errors = $this->subscribeService->errors();
           return redirect()->back() ->with('$errors','برجاء ادخال بيانات صحيحة');
    }
    public function getSubscribeById($id=0){
         $subscribe= $this->subscribeService->getSubscribeById($id);
         if($subscribe)
             echo'<pre>';
             print_r($subscribe) ;



    }
    public function getAllSubscribes(){
     $subscribes=$this->subscribeService->getSubscribes();
     if($subscribes)


         return view('admin.subscribe.allSubscribe')
           ->with('subscribe',$subscribes)
               ->with('title','حالات الشركاء');
         return 'لا يوجد اى داتا ';



    }
    public function updateSubscribe($id=0){
      $subscribe=$this->getSubscribeById($id);
      $travel= new TravelServices();
      $level=new LevelTravelRepository();
      $partner=new PartnerRepository();
      if($subscribe){
          $travel->getTravels();
          $level->GetLevelAll();
          $partner->GetAllPartner();
          $currency=Currency_type::all();
          return view();
      }

    }


}
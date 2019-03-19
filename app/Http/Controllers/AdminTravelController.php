<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 3/9/2019
 * Time: 5:57 AM
 */

namespace App\Http\Controllers;


use App\gm\travel\Model\travel;
use App\gm\travel\Services\TravelServices;
use Illuminate\Http\Request;


class AdminTravelController extends Controller
{
  private $travelServices;

    /**
     * TravelControllers constructor.
     *
     */
  public function __construct()
  {
      $this->travelServices=new TravelServices();
  }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

  public function AddTravel(){
    return view('admin.travel.addTravel')
               ->with('title','اضافة رحله');
  }

    /**
     * @param Request $request
     * @return string
     */
   public  function processAddTravel(Request $request){
          if($this->travelServices->addTravel($request))
              return 'تمت الاضافه بنجاح';
          else
              return $this->travelServices->errors();
   }

   public function updateTravel($id=0){
       $travels= new travel();
       $travel=$travels->find($id);
       if($travel)

           return view('admin.travel.updateTravel')
                   ->with('travel',$travel)
                   ->with('title','تعديل الرحله');
       return redirect()->back() ->with('$errors','برجاء ادخال بيانات صحيحة');
   }
   public function processUpdateTravel(Request $request){
      if( $this->travelServices->updateTravel($request))
         return  'تم التعديل بنجاح';
      else
          return $this->travelServices->errors();


   }
   public function getTravels(){
       $travels=$this->travelServices->getTravels();
       if(count($travels)>0)
           return view('admin.travel.travels')
               ->with('travels',$travels)
               ->with('title','الرحلات');
       else
           return false;

   }
   public function getTravelById($id=0){
    $travel=$this->travelServices->getTravelById($id);
    if($travel)
        return view('travelById')->with('travel',$travel);
    return 'not found';
   }
   public function count(){
       return $this->travelServices->countOfTravels();
  }
   public function deleteTravel($id=0){
        if($this->travelServices->deleteTravel($id))
            return 'تم حذف الرحله';
        return $this->travelServices->errors();
    }
    public function updateActive($id,$status){
       if($this->travelServices->updateActive($id,$status))
           return back();
       return $this->travelServices->errors();
    }
    public function search(Request $request){
        $travel=$this->travelServices->searchTravel($request);
        if(count($travel)>0)
            return view('dashboard.admin.searchCourses')
                ->with('travel',$travel);
        $errors=$this->travelServices->errors();
          return redirect()->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }




    }
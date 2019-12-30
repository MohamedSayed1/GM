<?php


namespace App\Http\Controllers\Admin\Sub;


use App\gm\Partner_payment;
use App\gm\safeTrait;
use App\gm\travel\Model\Partner;
use App\gm\travel\Model\Payment;
use App\gm\travel\Model\travel;
use App\gm\travel\Services\paymentServices;
use App\gm\travel\Services\subscribeServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class PayMentControllers extends Controller
{

    use Partner_payment;
    use safeTrait;
    private $subScribSer;

    private $paymentSer;

    public function __construct()
    {
        $this->paymentSer = new paymentServices();

        $this->subScribSer = new subscribeServices();
    }

    public function addView($travel=0 ,$partner=0)
    {

       $sub= $this->getSubByTravelAndPartner($travel,$partner);
       if(!empty($sub))
       {
           $total = $this->getTotal($travel,$partner);
           $pay = $this->getPayment($travel,$partner);
           // get remainder
           $remainder = $total - $pay ;
           if($remainder > 0)
           {
               return view('admin.subscribe.addPayment')
                   ->with('remainder',$remainder)
                   ->with('pay',$pay)
                   ->with('total',$total)
                   ->with('sub',$sub)
                   ->with('title','اضافة دفعة جديده لعميل ');
           }

           // return back - with Cant pay agine
           return redirect('dashboard/admin/travels/subscribe/index')
               ->withErrors([' هذا العميل دفع جميع مستحقاته بالفعل']);
       }

        // Not Found
        return redirect('dashboard/admin/travels/subscribe/index')
            ->withErrors([' لا يوجد شئ لعرضه']);

    }

    public function addProcess(Request $request)
    {
        $data =  $request->all();

        if($this->paymentSer->addNew($data))
        {
            alert()->success('تم الاضافه بنجاح ');
            return redirect('dashboard/admin/travels/subscribe/index');
        }

        $errors = $this->paymentSer->errors();
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);
    }


    // get Reports

    public function getReports(Request $request)
    {
        // valid
        $data = $request->all();
        $rules = [
            'travel-selected'       => 'required|integer',
            'id_state'      => 'required|integer',

        ];
        $messages = [
            'travel-selected.required' => ' برجاء ادخال الرحله ',
            'id_state.required' => ' برجاء ادخال الشريك',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $errors=$validator->errors()->all();
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($errors);

        }
        // get Reports
        $sub= $this->getSubByTravelAndPartner($data['travel-selected'],$data['id_state']);
        if(!empty($sub))
        {
            $total = $this->getTotal($data['travel-selected'],$data['id_state']);
            $pay = $this->getPayment($data['travel-selected'],$data['id_state']);
            // get remainder
            $remainder = $total - $pay ;

            // get payment by travel and partner

            $payment = Payment::where([
                ['id_travel',$data['travel-selected']],
                ['id_partner',$data['id_state']],
            ])->get();

            $safe = $this->getExpensesSubscrib($data['travel-selected'],$data['id_state']);
            $total_safe =$safe->sum('cash');

                return view('admin.subscribe.paymentReports')
                    ->with('remainder',$remainder)
                    ->with('pay',$pay)
                    ->with('safe',$safe)
                    ->with('total_safe',$total_safe)
                    ->with('total',$total)
                    ->with('payment',$payment)
                    ->with('sub',$sub)
                    ->with('title','تقرير عن العميل');

            // return back - with Cant pay agine

        }

        // Not Found
        return redirect('dashboard/admin/travels/subscribe/index')
            ->withErrors([' لا يوجد شئ لعرضه']);




    }


    public function getSubReport($id=0)
    {
        //check travel
        $travels = travel::find($id);

        $rows = $this->subScribSer->getParnterByTraId($id);
        if(!empty($travels))
        {
            $subscribs = $this->getSubBytrid($id);
            $safe      = $this->getExpenToRtavel($id);
            $total_safe = $safe->sum('amont');

            return view('admin.subscribe.subscribe-reports')
                ->with('subscribs',$subscribs)
                ->with('travels',$travels)
                ->with('rows',$rows)
                ->with('safe',$safe)
                ->with('total_safe',$total_safe)
                ->with('title','تقرير مجمع عن '.$travels->travel_name);
        }

        return redirect('dashboard/admin/travels/subscribe/index')
            ->withErrors([' لا يوجد شئ لعرضه']);
    }

    public function getAllPartSub($id = 0)
    {
        $partner = Partner::find($id);

        if(!empty($partner))
        {
          $allTravel = $this->getSubBypartneridAll($id);
          return view('admin.subscribe.partner-reports')
          ->with('partner',$partner)
          ->with('allTravel',$allTravel)
          ->with('title','تقرير عن العميل');
        }
         return redirect()->back()
        ->withErrors([' برجاء اختيار عميل موجود بالفعل حتي نتمكن من مساعدتك']);
    }

}
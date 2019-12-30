<?php


namespace App\Http\Controllers\Admin\Sub;


use App\gm\Partner_payment;
use App\gm\safe\Repository\safeRepository;
use App\gm\travel\Services\TravelServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashingController extends Controller
{
    use Partner_payment;
    private $travel;
    private $safe;

    public function __construct()
    {
        $this->travel = new TravelServices();
        $this->safe   = new safeRepository();
    }

    public function view()
    {
      $travels = $this->travel->getTravels();

      return view('admin.subscribe.expenses')
          ->with('travels',$travels)
          ->with('title','مصروفات لعميل في رحله');
    }

    public function getPartnerWithCash($tavel_id,$partner_id)
    {
        $total = $this->getTotal($tavel_id,$partner_id);

        $paid = self::restMoney($tavel_id,$partner_id);

        $data =[
            'totla'=>$total,
            'paid'=>$paid
        ];

        return response()->json($data);
    }

    public function addprocess(Request $request)
    {
        $data = $request->all();

        // check here
        $check = $this->safe->getSumpartner($data['partner_id'],$data['travel_id']);

        $total =  $check + $data['cash'];

        if($total > $data['lastpaid'])
        {
                $massage = 'تم صرف مسبقا ';
                $massage .= ' '.$check;
                $massage .=' '.'قيمه المدفوع ';
                $massage .=' '.$data['lastpaid'];
                $massage .=' '.'ولذلك لا يمكن صرف ';
                $massage .=' '.$data['cash'];
                $errors = [$massage];
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($errors);
        }

        if($this->safe->addNew($data))
        {
            alert()->success('تم الاضافه بنجاح ');
            return redirect('dashboard/admin/travels/subscribe/index');
        }

        $errors = ['هناك خطاء برجاء المحاوله مره اخري'];
        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($errors);


    }

}
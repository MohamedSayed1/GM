<?php


namespace App\Http\Controllers\Admin;

use App\gm\cost\service\CostService;
use App\gm\Partner_payment;
use App\gm\travel\Model\travel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminCostsController extends Controller
{
    private $costService;
    use Partner_payment;

    function __construct()
    {
        $this->costService = new CostService();
    }

    public function index()
    {
        $travels = travel::orderBy('updated_at', 'DESC')->get();
        $costs = $this->costService->getAll();


        return view('admin.cost.index', compact('travels', 'costs'));
    }

    public function storeCost(Request $request)
    {
        $data = $request->all();

        if ($this->costService->addCost($data)) {
            alert()->success('تم الامر');
            return redirect('dashboard/admin/costs/index');
        }


        $errors = $this->costService->errors();
        return redirect()->back()
            ->withInput($request->all())
            ->withErrors($errors);

    }

    public function editCost($id = 0)
    {

        if ($cost = $this->costService->getCostById($id)) {
            $travels = travel::orderBy('updated_at', 'DESC')->get();
            return view('admin.cost.editCost')
                ->with('title', 'الاراضي المقدسه | تعديل تكاليف الرحلة')
                ->with('cost', $cost)
                ->with('travels', $travels);
        }

        $errors = $this->costService->errors();
        return redirect()
            ->back()
            ->withErrors($errors);


    }

    public function updateCost(Request $request)
    {

        $data = $request->all();

        if ($this->costService->updateCost($data)) {
            alert()->success('تم الامر');
            return redirect('dashboard/admin/costs/index');
        }


        $errors = $this->costService->errors();
        return redirect()->back()
            ->withInput($request->all())
            ->withErrors($errors);

    }

    public function searchCostTravel(Request $request)
    {
        $idTravel = $request->all();

        $id = $idTravel['travel_id'];
        //trip by id
        $travel=travel::findOrFail($id);
        //مبلغ الرحلة كامل Total of trip
        $totalAll = $this->totalToTravel($idTravel);
        //تكلفة الشركة بناءا على رحلة معينه
        $totalAllCost = $this->TotalAllCost($id);
        // تفاصيل تكلفة الشركة بناءا على رحلة معينه
        $descCost = $this->costService->getCostsToTravelByTravelID($id);
        //صافى الربح
        $netProfit=$totalAll - $totalAllCost ;

        if ($totalAllCost == null || $descCost == null) {
            alert()->warning('عذرأ ! لم يتم اضافة حسابات لهذه الرحلة');
            return redirect('dashboard/admin/costs/index');
        }

        return view('admin.cost.costTotal', compact('totalAll', 'totalAllCost', 'descCost','travel','netProfit'));

    }
}
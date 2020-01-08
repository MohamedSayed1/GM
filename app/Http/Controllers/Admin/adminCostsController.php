<?php


namespace App\Http\Controllers\Admin;

use App\gm\cost\Model\Cost;
use App\gm\cost\Model\Supplier;
use App\gm\cost\service\CostService;
use App\gm\Partner_payment;
use App\gm\travel\Model\travel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

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

    public function getCostByTypeNormalAndTravel($type = 0, $travelID = 0)
    {
        if ($getByType = $this->costService->getCostByType($type, $travelID)) {
            return $getByType;
        }
        $errors = $this->costService->errors();
        return redirect()
            ->back()
            ->withErrors($errors);
    }

    public function getCostByTypeHotelAndTravel($type = 1, $travelID = 0)
    {
        if ($getByType = $this->costService->getCostByType($type, $travelID)) {
            return $getByType;
        }
        $errors = $this->costService->errors();
        return redirect()
            ->back()
            ->withErrors($errors);
    }

    public function searchCostTravel(Request $request)
    {
        $idTravel = $request->all();

        $id = $idTravel['travel_id'];

        //trip by id
        $travel = travel::findOrFail($id);
        //مبلغ الرحلة كامل Total of trip
        $totalAll = $this->totalToTravel($id);

        //تكلفة الشركة بناءا على رحلة معينه
        $totalAllCost = self::TotalAllCost($id);

        // تفاصيل تكلفة الشركة بناءا على رحلة معينه
        $descCostNormal = $this->costService->getCostByTypeNormalAndTravel(0, $id);
        $descCostHotel = $this->costService->getCostByTypeHotelAndTravel(1, $id);

        //صافى الربح
        $netProfit = $totalAll - $totalAllCost;

        if ($totalAllCost == null || $descCostNormal == null || $descCostHotel == null) {
            alert()->warning('عذرأ ! لم يتم اضافة حسابات لهذه الرحلة');
            return redirect('dashboard/admin/costs/index');
        }

        return view('admin.cost.costTotal', compact('totalAll', 'totalAllCost', 'descCostNormal', 'descCostHotel', 'travel', 'netProfit'));

    }

    /*functions that for any reports*/

    public function TotalAllCost($id)
    {
        return $all = DB::table('costs')
            ->where([
                ['travel_id', $id],
            ])
            ->sum('total');
    }

    public function searchTravelBySupplier(Request $request)
    {

        $data = $request->all();
        $rules = [
            'travel-selected' => 'required|integer',
            'id_state' => 'required|integer',
        ];
        $messages = [
            'travel-selected.required' => ' برجاء ادخال الرحله ',
            'id_state.required' => ' برجاء ادخال المورد',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($errors);
        }
        $travel_id = $data['travel-selected'];
        $sup_id = $data['id_state'];
        $travel = travel::findOrFail($travel_id);
        $supplier = Supplier::findOrFail($sup_id);
        //get total of travel
        //مبلغ الرحلة كامل Total of trip
        $totalAll = $this->totalToTravel($travel_id);

        //تكلفة الشركة بناءا على رحلة معينه لمورد معين
        $totalAllCost = self::TotalAllCostBySupplier($travel_id, $sup_id);

        //بيانات المورد بناءا على النوع التكلفه
        //عاديه
        $normalCostToSup = $this->costService->getCostByTypeNormalAndTravelAndSupplier(0, $travel_id, $sup_id);
        //سكن
        $Hotel = $this->costService->getCostByTypeHotelAndTravelAndSupplier(1, $travel_id, $sup_id);

        if ($totalAll == null || $totalAllCost == null || $normalCostToSup == null || $normalCostToSup == null) {
            alert()->warning('عذرأ ! لم يتم اضافة حسابات لهذه الرحلة');
            return redirect('dashboard/admin/costs/index');
        }

        return view('admin.cost.ReportSupplier',
            compact('totalAll', 'totalAllCost', 'normalCostToSup', 'Hotel', 'travel', 'supplier'));


    }

    public function TotalAllCostBySupplier($id, $sup_id)
    {
        return $all = DB::table('costs')
            ->where([
                ['travel_id', $id],
                ['supplier_id', $sup_id],
            ])
            ->sum('total');
    }

    //if the search url route is get
    public function returnToIndex()
    {
        return redirect('dashboard/admin/costs/index');

    }

    public function delete($id = 0)
    {
        if ($this->costService->del($id)) {
            alert()->success('تم الحذف بنجاح ');
            return redirect()->back();
        }

        $errors = $this->costService->errors();
        return redirect()->back()->withErrors($errors);
    }

    public function getSuppliersByTravelId($travel_id)
    {
        $travel = $this->costService->getSupplierNameAndIdFromCost($travel_id);

        return response()->json($travel);

    }

////////////////////////////////////////////////
    public function getAllTravelBySupplier($id_sub)
    {
        $sup = Supplier::findOrFail($id_sub);
        if (!empty($sup)) {
            $hotel = $this->costService->getCostByTypeHotelAndSupplier(1, $id_sub);
            $normal = $this->costService->getCostByTypeNormalAndSupplier(0, $id_sub);
            $totalOfSupplier = self::TotalAllCostBySupplierGroupTotal($id_sub);
            if ($normal == null || $hotel == null || $totalOfSupplier== null) {
                alert()->warning('عذرأ ! لم يتم اضافة حسابات لهذه الرحلة');
                return redirect('dashboard/admin/costs/index');
            }

            return view('admin.cost.ReportOfSupplier',
                compact('totalOfSupplier', 'hotel', 'sup', 'normal'));


        }

    }

    public function TotalAllCostBySupplierGroupTotal($sup_id)
    {
        return $all = DB::table('costs')
            ->join('travel', 'travel.travel_id', '=', 'costs.travel_id')
            ->join('suppliers', 'suppliers.su_id', '=', 'costs.supplier_id')
            ->select(
                'suppliers.su_name', 'travel.travel_name', 'costs.type', 'costs.name_costs', DB::raw("IFNULL(sum(costs.total),0) as total")
            )
            ->where([
                ['supplier_id', $sup_id],
            ])->groupBy('costs.travel_id', 'costs.type')
            ->get();
    }


}



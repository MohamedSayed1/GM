<?php

namespace App\gm\cost\Service;


use App\gm\cost\Repository\CostRepository;
use App\gm\Services;
use Cassandra\Time;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Validator;


class CostService extends Services
{

    private $costRepository;

    public function __construct()
    {
        $this->costRepository = new CostRepository();
    }

    public function getAll()
    {
        return $this->costRepository->getAll();
    }

    public function addCost($data)
    {
        //تحديد نوع التكلفه
        if ($data['t_type'] == 0) {
            $rules = [
                'travel_id' => 'required|integer',
                'supplier_id' => 'required',
                'name_costs' => 'required',
                'unit_price' => 'required|numeric',
                'count' => 'required|integer',
                'pound' => 'nullable|numeric',

            ];
            $messages = [
                'travel_id.required' => ' برجاء ادخال الرحله ',
                'supplier_id.required' => ' برجاء ادخال المورد ',
                'name_costs.required' => ' برجاء ادخال إسم الوحده',
                'unit_price.required' => 'يجب ادخال سعر الوحده',
                'unit_price.numeric' => 'يجب ادخال سعر الوحده',
                'count.required' => 'عدد الوحدات',
                'pound.numeric' => 'العملة يجب ان تكون رقما',

            ];
        } elseif ($data['t_type'] == 1) {
            $rules = [
                'travel_id' => 'required|integer',
                'supplier_id' => 'required',
                'name_costs' => 'required',
                'unit_price' => 'required|numeric',
                'pound' => 'nullable|numeric',
                'night_number' => 'required|integer',
                'room_num' => 'required|integer',

            ];
            $messages = [
                'travel_id.required' => ' برجاء ادخال الرحله ',
                'supplier_id.required' => ' برجاء ادخال المورد ',
                'name_costs.required' => ' برجاء ادخال إسم الوحده',
                'unit_price.required' => 'يجب ادخال سعر الوحده',
                'pound.numeric' => 'العملة يجب ان تكون رقما',
                'night_number.required' => ' برجاء ادخال عدد الليالى ',
                'night_number.integer' => ' يجب إدخال رقم لعدد الليالى ',
                'room_num.required' => 'برجاء إدخال عدد الفرف',
                'room_num.integer' => 'يجب أن يكون عدد الغرف رقما'

            ];

        }


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // total
        if ($data['t_type'] == 0) {
            $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
            $data['total'] = $data['unit_price'] * $data['count'] * $data['pound'];
        } elseif ($data['t_type'] == 1) {
            $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
            $data['total'] = $data['night_number'] * $data['unit_price'] * $data['room_num'] * $data['pound'];
        }


        if ($this->costRepository->addCost($data))
            return true;


    }

    public function updateCost($data)
    {


        //تحديد نوع التكلفه
        if ($data['t_type'] == 0) {
            $rules = [
                'travel_id' => 'required|integer',
                'supplier_id' => 'required',
                'name_costs' => 'required',
                'unit_price' => 'required|numeric',
                'count' => 'required|integer',
                'pound' => 'nullable|numeric',

            ];
            $messages = [
                'travel_id.required' => ' برجاء ادخال الرحله ',
                'supplier_id.required' => ' برجاء ادخال المورد ',
                'name_costs.required' => ' برجاء ادخال إسم الوحده',
                'unit_price.required' => 'يجب ادخال سعر الوحده',
                'unit_price.numeric' => 'يجب ادخال سعر الوحده',
                'count.required' => 'عدد الوحدات',
                'pound.numeric' => 'العملة يجب ان تكون رقما',

            ];
        } elseif ($data['t_type'] == 1) {
            $rules = [
                'travel_id' => 'required|integer',
                'supplier_id' => 'required',
                'name_costs' => 'required',
                'unit_price' => 'required|numeric',
                'pound' => 'nullable|numeric',
                'night_number' => 'required|integer',
                'room_num' => 'required|integer',

            ];
            $messages = [
                'travel_id.required' => ' برجاء ادخال الرحله ',
                'supplier_id.required' => ' برجاء ادخال المورد ',
                'name_costs.required' => ' برجاء ادخال إسم الوحده',
                'unit_price.required' => 'يجب ادخال سعر الوحده',
                'pound.numeric' => 'العملة يجب ان تكون رقما',
                'night_number.required' => ' برجاء ادخال عدد الليالى ',
                'night_number.integer' => ' يجب إدخال رقم لعدد الليالى ',
                'room_num.required' => 'برجاء إدخال عدد الفرف',
                'room_num.integer' => 'يجب أن يكون عدد الغرف رقما'

            ];
        }


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // total
        if ($data['t_type'] == 0) {
            $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
            $data['total'] = $data['unit_price'] * $data['count'] * $data['pound'];
        } elseif ($data['t_type'] == 1) {
            $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
            $data['total'] = $data['night_number'] * $data['unit_price'] * $data['room_num'] * $data['pound'];
        }


        if ($this->costRepository->updateCost($data))
            return true;


    }

    public function getCostById($id)
    {
        if ($cost = $this->costRepository->getCostById($id))
            return $cost;
        $this->setError('غير موجود');
        return false;
    }
    public function getSupplierNameAndIdFromCost($travel_id){
     return   $this->costRepository->getSupplierNameAndIdFromCost($travel_id);


    }

    public function getCostByType($type, $travelID)
    {
        if ($cost = $this->costRepository->getCostByType($type, $travelID))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }

    public function getCostByTypeHotelAndTravel($type, $travelID)
    {
        if ($cost = $this->costRepository->getCostByTypeHotelAndTravel($type, $travelID))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }

    public function getCostByTypeNormalAndTravel($type, $travelID)
    {
        if ($cost = $this->costRepository->getCostByTypeNormalAndTravel($type, $travelID))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }
    public function getCostByTypeHotelAndTravelAndSupplier($type, $travelID,$sup_id)
    {
        if ($cost = $this->costRepository->getCostByTypeHotelAndTravelAndSupplier($type, $travelID,$sup_id))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }
    public function getCostByTypeNormalAndTravelAndSupplier($type, $travelID,$sup_id)
    {
        if ($cost = $this->costRepository->getCostByTypeNormalAndTravelAndSupplier($type, $travelID,$sup_id))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }

    ///////////
    public function getCostByTypeHotelAndSupplier($type,$sup_id)
    {
        if ($cost = $this->costRepository->getCostByTypeHotelAndSupplier($type,$sup_id))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }
    public function getCostByTypeNormalAndSupplier($type,$sup_id)
    {
        if ($cost = $this->costRepository->getCostByTypeNormalAndSupplier($type,$sup_id))
            return $cost;
        $this->setError('    عفوا ! هناك خطأ ما فى نوع التكلفه');
        return false;
    }

    /// ////////



    public function getCostsToTravelByTravelID($id)
    {
        return $this->costRepository->getCostsToTravelByTravelID($id);

    }

    public function del($id)
    {
        if ($this->costRepository->del($id))
            return true;


        $this->setError('عفوا حدث خطاء برجاء المحاوله مره اخري ');
        return false;
    }


}

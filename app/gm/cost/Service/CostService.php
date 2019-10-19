<?php

namespace App\gm\cost\service;


use App\gm\cost\Repository\CostRepository;
use App\gm\Services;
use Cassandra\Time;
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

        $rules = [
            'travel_id' => 'required|integer',
            'name_costs' => 'required',
            'unit_price' => 'required|numeric',
            'count' => 'required|integer',
            'pound' => 'nullable|numeric',

        ];
        $messages = [
            'travel_id.required' => ' برجاء ادخال الرحله ',
            'name_costs.required' => ' برجاء ادخال إسم الوحده',
            'unit_price.required' => 'يجب ادخال سعر الوحده',
            'unit_price.numeric' => 'يجب ادخال سعر الوحده',
            'count.required' => 'عدد الوحدات',
            'pound.numeric' => 'العملة يجب ان تكون رقما',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // total
        $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
        $data['total'] = $data['unit_price'] * $data['count'] * $data['pound'];


        if ($this->costRepository->addCost($data))
            return true;


    }

    public function updateCost($data)
    {

        $rules = [
            'travel_id' => 'required|integer',
            'name_costs' => 'required',
            'unit_price' => 'required|numeric',
            'count' => 'required|integer',
            'pound' => 'nullable|numeric',

        ];
        $messages = [
            'travel_id.required' => ' برجاء ادخال الرحله ',
            'name_costs.required' => ' برجاء ادخال إسم الوحده',
            'unit_price.required' => 'يجب ادخال سعر الوحده',
            'unit_price.numeric' => 'يجب ادخال سعر الوحده',
            'count.required' => 'عدد الوحدات',
            'pound.numeric' => 'العملة يجب ان تكون رقما',

        ];


        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $this->setError($validator->errors()->all());
            return false;
        }

        // total
        $data['pound'] = isset($data['pound']) ? $data['pound'] : 1;
        $data['total'] = $data['unit_price'] * $data['count'] * $data['pound'];


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

    public function getCostsToTravelByTravelID($id)
    {
         return $this->costRepository->getCostsToTravelByTravelID($id) ;

  }


}

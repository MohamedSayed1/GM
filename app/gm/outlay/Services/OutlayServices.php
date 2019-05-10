<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 5/7/2019
 * Time: 4:47 PM
 */

namespace App\gm\outlay\Services;


use App\gm\outlay\Repository\OutlayRepository;
use App\gm\Services;
use Validator;

class OutlayServices extends Services
{
    // connected with OutlayRepo

    private $OutlayRepo;

    public function __construct()
    {
        $this->OutlayRepo = new OutlayRepository();
    }

    public function getAll()
    {
        return $this->OutlayRepo->getOulays();
    }


    public function add($data)
    {

        // rules to valid
        $rules = [
            'date'             =>'required|date',
            'count'            =>'nullable|numeric',
            'name'             =>'required|max:249',
            'value'            =>'required|numeric',

        ];

        // customer Error Massages
        $messages = [
          'date.required'=>'يجب ادخال التاريخ',
          'name.required'=>'يجب ادخال البيان',
          'max.required'=>'يجب الا يزيد عدد حروف البيان عن 249 حرف',
          'value.required'=>'يجب ادخال القيمة',
          'value.numeric'=>'يجب ان يكون القيمه رقم',
          'count.numeric'=>'يجب ان يكون القيمه رقم',
          'date.date'=>'برجاء ادخال تاريخ',
        ];

        // vaild
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set erros
            $this->setError($validator->errors()->all());
            return false;
        }


        // Total = value * ( count => defult 1 && not required  )
        $data['count']= isset($data['count'])?$data['count']:1;
        $data['total']=$data['value']*$data['count'];

        // connected with -> Repo ( addNew  return ( true or false )
        if ($this->OutlayRepo->addNew($data))
            return true;


        return false;
    }

    //Search

    public function Search($date)
    {
        /**
         *  check if to have value or not if not (  day )
         *
         * get from
         */
        $to = isset($date['to'])?$date['to']:date("Y-m-d");

        $from = $date['from'];

        return $this->OutlayRepo->getByData($from,$to);
    }

    public function del($id)
    {
        $outlay = $this->OutlayRepo->getOulay($id);

        if(!empty($outlay))
        {
            return $this->OutlayRepo->del($id);
        }

        $erros = ['لا يوجد عنصر لحذفه ! '];
        $this->setError($erros);
        return false;
    }

    /**
     *  updated
     */

    public function getByID($id)
    {
        $outlay = $this->OutlayRepo->getOulay($id);
        if(!empty($outlay))
            return $outlay;


        $this->setError(['لا يوجد عنصر ']);
        return false;
    }

    public function updated($data)
    {
        // rules to valid
        $rules = [
            'date'             =>'required|date',
            'count'            =>'nullable|numeric',
            'name'             =>'required|max:249',
            'value'            =>'required|numeric',

        ];

        // customer Error Massages
        $messages = [
            'date.required'=>'يجب ادخال التاريخ',
            'name.required'=>'يجب ادخال البيان',
            'max.required'=>'يجب الا يزيد عدد حروف البيان عن 249 حرف',
            'value.required'=>'يجب ادخال القيمة',
            'value.numeric'=>'يجب ان يكون القيمه رقم',
            'count.numeric'=>'يجب ان يكون القيمه رقم',
            'date.date'=>'برجاء ادخال تاريخ',
        ];

        // vaild
        $validator = Validator::make($data,$rules,$messages);

        if($validator->fails())
        {
            // set erros
            $this->setError($validator->errors()->all());
            return false;
        }


        // Total = value * ( count => defult 1 && not required  )
        $data['count']= isset($data['count'])?$data['count']:1;
        $data['total']=$data['value']*$data['count'];

        // connected with -> Repo ( addNew  return ( true or false )
        if ($this->OutlayRepo->updated($data))
            return true;


        return false;
    }
}
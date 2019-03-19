@extends('admin.index')
@section ('title')
    {{$title}}
    @endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>ادخل بيانات الرحلة
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>


                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" action="{{url('dashboard/admin/travel/add')}}" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم الرحلة
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="travel_name" placeholder="اسم الرحلة" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الفندق / السكن
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="hotel_name" placeholder="الفندق / السكن" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                وسيلة المواصلات
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="transportaion"  placeholder="وسيلة المواصلات" id="form-field-2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                تاريخ القيام
                            </label>
                            <div class="col-sm-5">
                                <input type="date" name="start_day" placeholder="تاريخ القيام" id="form-field-2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                تاريخ العودة
                            </label>
                            <div class="col-sm-5">
                                <input type="date" name="end_day" placeholder="تاريخ العودة" id="form-field-2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الحالة
                            </label>
                            <div class="col-sm-5">
                                <select id="form-field-select-1" name="is_active" class="form-control">
                                    <option value="0">لم تقم</option>
                                    <option value="1">قامت</option>
                                </select>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2" >
                                <div class="col-sm-2" >
                                    <button type="submit" class="btn btn-primary">
                                        اضافة رحله
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>



    @endsection
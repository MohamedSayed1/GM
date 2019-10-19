@extends('admin.index')
@section('title')

@endsection
@section('css')
    <link href="{{asset('template/bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css')}}"
          rel="stylesheet"/>
@endsection

@section('content')
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">


                <div class="page-header">
                    <h3>تكاليف الرحلات </h3>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <!-- // add-cost -->
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> ادخل التفاصيل
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>


                            <a class="btn btn-xs btn-link panel-expand" href="#">
                                <i class="fa fa-resize-full"></i>
                            </a>

                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                        @endif
                        <form role="form" class="form-horizontal" action="{{url('dashboard/admin/costs/store')}}"
                              method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" name="travel_id"
                                            class="form-control search-select-trip">
                                        @foreach($travels as $travel)
                                            <option value="{{$travel->travel_id}}">{{$travel->travel_name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    البيان
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="name_costs" placeholder="البيان " id="form-field-1"
                                           class="form-control">
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    العدد
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" name="count" placeholder="0 " id="form-field-1"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    السعر
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" name="unit_price" placeholder="0" id="form-field-2"
                                           class="form-control">
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    سعر العملة بالمصرى
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" name="pound" placeholder="0" id="form-field-2"
                                           class="form-control">
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <a href="#">
                                        <button type="submit" class="btn btn-primary">
                                            اضافة التكلفة
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
            <!-- // cost-Report -->
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>
                        ابحث عن رحلة معينة
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>
                            <a class="btn btn-xs btn-link panel-expand" href="#">
                                <i class="fa fa-resize-full"></i>
                            </a>

                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('dashboard/admin/costs/search')}}" method="get" class="form-horizontal" >

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" name="travel_id" class="form-control search-trip">
                                        <option name="travel_id">&nbsp;</option>
                                        @foreach($travels as $travel)
                                        <option value="{{$travel->travel_id}}">{{$travel->travel_name}}|| التاريخ : {{$travel->start_day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">
                                    <a href="#">
                                        <button type="submit" class="btn btn-primary">
                                            بحث
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
            <!-- // Cost Data TAble -->
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> جدول البيانات
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>
                            <a class="btn btn-xs btn-link panel-expand" href="#">
                                <i class="fa fa-resize-full"></i>
                            </a>

                        </div>
                    </div>
                    <div class="panel-body">
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover  table-full-width" id="sample-table-2">
                                <thead>
                                <tr>
                                    <th class="col-to-export text-right">اسم الرحلة</th>
                                    <th class="col-to-export text-right">البيان</th>
                                    <th class="col-to-export text-right">عدد</th>
                                    <th class="col-to-export text-right">السعر</th>
                                    <th class="col-to-export text-right">العملةبالمصرى</th>
                                    <th class="col-to-export text-right">الإجمالى</th>
                                    <th class=" text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($costs as $cost)
                                    <tr>
                                        <td>{{$cost->travel_name}}</td>
                                        <td>{{$cost->name_costs}}</td>
                                        <td>{{$cost->count}}</td>
                                        <td>{{$cost->unit_price}}</td>
                                        <td>{{$cost->pound}}</td>
                                        <td>{{$cost->total}}</td>

                                        <td class="text-center">
                                            <a href="{{url('dashboard/admin/costs/update/'.$cost->costs_id)}}" class="btn btn-xs btn-teal tab-btn tooltips"
                                               data-placement="top"
                                               data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-xs  btn-bricky tooltips" data-placement="top"
                                               data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="col-to-export text-right">الاجمالى</th>
                                    <td></td>
                                    <td></td>
                                    <td> 11111</td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
        </div>
    </div>

    <!-- end: PAGE CONTENT-->
@endsection
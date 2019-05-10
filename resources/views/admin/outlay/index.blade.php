@extends('admin.index')
@section('title')
     {{$title}}
@endsection
@section('css')
    <link href="{{asset('template/bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css')}}" rel="stylesheet" />
@endsection

@section('content')



    <!-- start: PAGE HEADER -->
    <div class="row">
        <div class="col-sm-12">


            <div class="page-header">
                <h3>المصاريف </h3>
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
                    <i class="fa fa-external-link-square"></i> ادخل  التفاصيل
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>


                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/outlay/view/add')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                البيان
                            </label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="البيان " name="name" value="{{old('name')}}" id="form-field-1" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-1">
                                العدد
                            </label>
                            <div class="col-sm-4">
                                <input type="number" placeholder="0" name="count" value="{{old('count')}}" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                القيمة
                            </label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="0" name="value"  value="{{old('value')}}" id="form-field-2" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-2">
                                التاريخ
                            </label>
                            <div class="col-sm-4">
                                <input type="date" placeholder="dd-mm-yyyy" name="date" value="{{old('date')}}" id="form-field-2" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-sm-2 col-sm-offset-2" >
                                <a href="#"><button type="submit" class="btn btn-primary">
                                        اضافة  التكلفة
                                    </button></a>
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
                    <i class="fa fa-external-link-square"></i> تقرير عن المصروفات  في فترة معينة
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/outlay/view/search')}}">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                من تاريخ
                            </label>
                            <div class="col-sm-4">
                                <input type="date" placeholder="dd-mm-yyyy" name="from" value="{{old('from')}}" id="form-field-2" class="form-control" required>
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الى تاريخ
                            </label>
                            <div class="col-sm-4">
                                <input type="date" placeholder="dd-mm-yyyy" name="to" value="{{old('to')}}" id="form-field-2" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-primary">
                                        بحث فى هذه الفترة
                                    </button>
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
                                <th class="col-to-export text-right">البيان </th>
                                <th class="col-to-export text-right">القيمة </th>
                                <th class="col-to-export text-right">عدد </th>
                                <th class="col-to-export text-right">الاجمالى  </th>
                                <th class="col-to-export text-right">التاريخ  </th>
                                <th class="col-to-export text-right"> </th>
                            </tr>
                            </thead>
                            <tbody>
                             @if(isset($outlays))
                              @foreach($outlays as $outlay)
                                 <tr>
                                    <td>{{$outlay->outlay_name}} </td>
                                    <td>{{$outlay->value}}</td>
                                    <td>{{$outlay->count}}</td>
                                    <td>{{$outlay->total}}</td>
                                    <td>{{$outlay->date}}</td>
                                    <td class="text-center">
                                        <a href="{{url('dashboard/admin/outlay/view/updated/'.$outlay->outlay_id)}}" class="btn btn-xs btn-teal tab-btn tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        <a  href="{{url('dashboard/admin/outlay/view/del/'.$outlay->outlay_id)}}" onclick="return confirm('هل انتا متاكد ؟')" class="btn btn-xs  btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                    </td>
                                </tr>

                              @endforeach
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>

    <!-- end: PAGE CONTENT-->




@endsection

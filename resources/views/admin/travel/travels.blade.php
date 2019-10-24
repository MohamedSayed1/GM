@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section ('content')

<div class="row">
    <div class="col-sm-12">
        
        <div class="page-header">
            <h3>ﺩﻟﻴﻞ اﻟﺮﺣﻼﺕ</h3>

        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
    </div>
</div>
<!-- end: PAGE HEADER -->
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
                </div>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
            

                <form role="form" class="form-horizontal" action="{{url('dashboard/admin/travel/add')}}" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            اسم الرحلة
                        </label>
                        <div class="col-sm-4">
                            <input type="text" name="travel_name" placeholder="اسم الرحلة" id="form-field-1" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label" for="form-field-1">
                            تاريخ القيام
                        </label>
                        <div class="col-sm-4">
                            <input type="date" name="start_day" placeholder="تاريخ القيام" id="form-field-2" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2" >
                            <button type="submit" class="btn btn-primary">
                                اضافة
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>
</div>
<div id="masge">
    @if(session()->has('$message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>    {{ session()->get('$message') }}
        </div>
    @endif

    @if(session()->has('$errors'))
        <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-remove"></span>   {{ session()->get('$errors') }}
        </div>
    @endif


</div>
<!-- // cost-Report -->
<div class="row">
    <div class="col-md-12">
        <!-- start: trips Details-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> ﺗﻔﺎﺻﻴﻞ اﻟﺮﺣﻼﺕ
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th class="text-right">رقم الرحلة</th>
                            <th class="text-right">اسم الرحلة</th>
                            <th class="text-right">ناريخ القيام</th>
                            <th class="text-right">&shy;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($travels))
                        @foreach($travels as $travel)
                        <tr>
                            <td>{{$travel->travel_id}} </td>
                            <td>{{$travel->travel_name}} </td>
                            <td>{{$travel->start_day}}</td>

                            <td class="text-left">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{url('dashboard/admin/travel/update/'.$travel->travel_id)}}" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="تعديل"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{url('dashboard/admin/costs/search?travel_id='.$travel->travel_id)}}" class="btn btn-xs btn-bricky2 tooltips" data-placement="top" data-original-title="تقرير مصاريف الرحلة "><i class="clip-file"></i></a>
                                    <a href="{{url('/dashboard/admin/travels/subscribe/reports/'.$travel->travel_id)}}" class="btn btn-xs btn-bricky2 tooltips" data-placement="top" data-original-title="تقرير مبيعات الرحلة "><i class="clip-file"></i></a>


                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <!-- end: trips Details -->

    </div>
</div>

    @endsection
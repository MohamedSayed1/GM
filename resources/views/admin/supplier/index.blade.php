@extends('admin.index')
@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            
            <div class="page-header">
                <h3>دليل الموردين</h3>
                <a href="{{url('dashboard/admin/supplier/view/add')}}"><button type="button" class="btn btn-primary">
                        اضافة مورد
                    </button></a>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <!-- end: PAGE HEADER -->
    <div id="masge">
        @if(session()->has('$massage'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>    {{ session()->get('$massage') }}
            </div>
        @endif

        @if(session()->has('$errors'))
            <div class="alert alert-warning" role="alert">
                <span class="glyphicon glyphicon-remove"></span>   {{ session()->get('$errors') }}
            </div>
        @endif


    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- start: trips Details-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> بيانات الموردين
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                        
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                        <thead>
                        <tr>
                            <th class="text-right">اسم المورد</th>
                            <th class="text-right">رقم التليفون</th>
                            <th class="text-right">&shy;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($partner))
                            @foreach($partner as $sup)
                                <tr>

                                    <td>{{$sup->su_name}}</td>
                                    <td>{{$sup->su_phone}}</td>
                                    <td class="text-left">
                                        <a href="{{url('dashboard/admin/supplier/view/updated/'.$sup->su_id)}}" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="تعديل"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('dashboard/admin/travels/cost/supplier/reportSup/'.$sup->su_id)}}" class="btn btn-xs btn-bricky2 tooltips" data-placement="top" data-original-title="تقرير اجمالى مدفوعاته لكل الرحلات "><i class="clip-file"></i></a>
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
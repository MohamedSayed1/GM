@extends('admin.index')
@section('title')
    الأراضى المقدسة | تكاليف مصاريف رحلة
@endsection
@section('css')
    <link href="{{asset('template/bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css')}}"
          rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">


            <div class="page-header">
                <h3> تكاليف مصاريف رحلة: {{$travel->travel_name}}</h3>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

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
                        @foreach($descCost as $cost)
                            <tr>
                                <td>{{$cost->travel_name}}</td>
                                <td>{{$cost->name_costs}}</td>
                                <td>{{$cost->count}}</td>
                                <td>{{$cost->unit_price}}</td>
                                <td>{{$cost->pound}}</td>
                                <td>{{$cost->total}}</td>


                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="col-to-export text-right">إجمالى ما تحملته الشركه</th>
                            <td></td>
                            <td></td>
                            <td> {{$totalAllCost}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="col-to-export text-right">إجمالى التكلفة</th>
                            <td></td>
                            <td></td>
                            <td> {{$totalAll}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="col-to-export text-right">الربح</th>
                            <td></td>
                            <td></td>
                            <td> {{$netProfit}}</td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>

@endsection
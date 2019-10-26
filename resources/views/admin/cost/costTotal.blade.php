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
                <h3> تقارير تكاليف رحلة: {{$travel->travel_name}}</h3>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>



    <!-- /////////////  تقرير التكاليف العاديه /////////////////////// -->



    <div class="page-container"><h2> التكاليف العادية</h2></div>
    @if(isset($descCostNormal)&& $descCostNormal!=null)
    <div class="col-sm-12">

        <!-- start: TEXT FIELDS PANEL -->
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

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($descCostNormal as $cost)
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
                    <tr style="border-bottom: 3px solid #aaa;">
                        <th class="col-to-export text-right">اسم الرحلة</th>
                        <th class="col-to-export text-right">البيان</th>
                        <th class="col-to-export text-right">عدد</th>
                        <th class="col-to-export text-right">السعر</th>
                        <th class="col-to-export text-right">العملةبالمصرى</th>
                        <th class="col-to-export text-right">الإجمالى</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- end: TEXT FIELDS PANEL -->

    </div>
    @else
        <h2>لا يوجد تكاليف عادية </h2>
    @endif



    <!-- /////////////  تقرير التكاليف االسكن/////////////////////// -->

    <div class="page-container"><h2> تكاليف السكن</h2></div>
    @if(isset($descCostNormal)&& $descCostNormal!=null)
    <div class="col-sm-12">

        <!-- start: TEXT FIELDS PANEL -->
            <div class="table-responsive">
                <table class="table table-striped table-hover  table-full-width" id="sample-table-2">
                    <thead>
                    <tr>
                        <th class="col-to-export text-right">اسم الرحلة</th>
                        <th class="col-to-export text-right">البيان</th>
                        <th class="col-to-export text-right">عدد الليالى</th>
                        <th class="col-to-export text-right">عدد الغرف</th>
                        <th class="col-to-export text-right">سعر الغرفة</th>
                        <th class="col-to-export text-right">العملةبالمصرى</th>
                        <th class="col-to-export text-right">الإجمالى</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($descCostHotel as $cost)
                        <tr>
                            <td>{{$cost->travel_name}}</td>
                            <td>{{$cost->name_costs}}</td>
                            <td>{{$cost->night_number}}</td>
                            <td>{{$cost->room_num}}</td>
                            <td>{{$cost->unit_price}}</td>
                            <td>{{$cost->pound}}</td>
                            <td>{{$cost->total}}</td>


                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                    <tr style="border-bottom: 3px solid #aaa;">
                        <th class="col-to-export text-right">اسم الرحلة</th>
                        <th class="col-to-export text-right">البيان</th>
                        <th class="col-to-export text-right">عدد الليالى</th>
                        <th class="col-to-export text-right">عدد الغرف</th>
                        <th class="col-to-export text-right">سعر الغرفة</th>
                        <th class="col-to-export text-right">العملةبالمصرى</th>
                        <th class="col-to-export text-right">الإجمالى</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

    <!-- end: TEXT FIELDS PANEL -->
    </div>
    @else
        <h2 class="box-title">لا يوجد تكاليف عادية </h2>
    @endif


    <!-- /////////////  تقرير الربح /////////////////////// -->

    <div class="page-container"><h2> التقرير النهائى لمصاريف الرحلة</h2></div>
    @if(isset($netProfit)&& $netProfit!=null)

    <div class="col-sm-12">

        <!-- start: TEXT FIELDS PANEL -->
            <div class="table-responsive">
                <table class="table table-striped table-hover  table-full-width" id="sample-table-2">
                    <thead>
                    <tr>
                        <th class="col-to-export text-right">كل تكاليف الشركة</th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right">الأجمالى</th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right"></th>

                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>ما تم صرفة</td>
                        <td></td>
                        <td></td>
                        <td>{{$totalAllCost}}</td>
                        <td></td>
                        <td></td>


                    </tr>
                    <tr>
                        <td>الإجمالى</td>
                        <td></td>
                        <td></td>
                        <td>{{ $totalAll}}</td>
                        <td></td>
                        <td></td>


                    </tr>


                    </tbody>
                    <tfoot>
                    <tr style="border-bottom: 3px solid #aaa;">
                        <th class="col-to-export text-right">الربح</th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right">{{$netProfit}}</th>
                        <th class="col-to-export text-right"></th>
                        <th class="col-to-export text-right"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- end: TEXT FIELDS PANEL -->

    </div>
@endif


@endsection
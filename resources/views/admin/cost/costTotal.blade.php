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
                    <th class="col-to-export text-right">إجمالى  التكاليف  </th>
                    <td></td>
                    <td></td>
                    <td> {{$totalAllCost}}</td>
                    <td></td>
                </tr>
                <tr>
                    <th class="col-to-export text-right">إجمالى  المبيعات </th>
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
        <!-- end: TEXT FIELDS PANEL -->
    </div>

@endsection
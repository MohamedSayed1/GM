@extends('admin.index')

@section ('content')


    <div class="row">
        <div class="col-sm-12">

            <div class="page-header">
                <h3> الرئيسية </h3>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->


            <!-- end: SPANEL CONFIGURATION MODAL FORM -->
            <div class="container">
                <!-- start: PAGE HEADER -->
                <div class="row">
                    <div class="col-sm-12">


                        <div class="page-header">
                            <h3>تقارير الخزنة </h3>
                        </div>
                        <!-- end: PAGE TITLE & BREADCRUMB -->
                    </div>
                </div>
                <!-- end: PAGE HEADER -->
                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <!-- // cost-Report -->
                    <div class="col-sm-12">
                        <!-- start: TEXT FIELDS PANEL -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i> تقرير عن الخزنة في فترة معينة
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    </a>
                                    <a class="btn btn-xs btn-link panel-expand" href="#">
                                        <i class="fa fa-resize-full"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" class="form-horizontal" method="post"
                                      action="{{url('dashboard/admin')}}">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-2">
                                            تقرير عن
                                        </label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="type">
                                                <option value="">الكل</option>
                                                <option value="1" {{app('request')->input('type') ==1 ?'selected':''}}>
                                                    المبيعات
                                                </option>
                                                <option value="2" {{app('request')->input('type') ==2 ?'selected':''}}>
                                                    مصروفات
                                                </option>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            الرحلة
                                        </label>
                                        <div class="col-sm-4">
                                            <select id="form-field-select-3" class="form-control search-select-trip"
                                                    name="travel">
                                                <option value="">&nbsp;الكل</option>
                                                @foreach($travels as $travel)
                                                    <option value="{{$travel->travel_id}}" {{app('request')->input('travel') ==$travel->travel_id?'selected':''}}>{{$travel->travel_name}}
                                                        || {{$travel->start_day}}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            المورد
                                        </label>
                                        <div class="col-sm-4">
                                            <select id="form-field-select-3" class="form-control search-select-client"
                                                    name="supp">
                                                <option value="">&nbsp;الكل</option>
                                                @foreach($supps as $su)
                                                    <option value="{{$su->su_id}}" {{app('request')->input('supp') ==$su->su_id?'selected':''}}>{{$su->su_name}}
                                                        || {{$su->su_phone}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            العميل
                                        </label>
                                        <div class="col-sm-4">
                                            <select id="form-field-select-3" class="form-control search-select-sub"
                                                    name="partner">
                                                <option value="">&nbsp;الكل</option>
                                                @foreach($partners as $par)
                                                    <option value="{{$par->partner_id}}" {{app('request')->input('partner') ==$par->partner_id?'selected':''}}>{{	$par->name}}
                                                        || {{$par->phone}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-2">
                                            من تاريخ
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="date" placeholder="dd-mm-yyyy" id="form-field-2"
                                                   class="form-control" name="from" value="{{app('request')->input('from') }}">
                                        </div>
                                        <label class="col-sm-2 control-label" for="form-field-2">
                                            الى تاريخ
                                        </label>
                                        <div class="col-sm-4">
                                            <input type="date" placeholder="dd-mm-yyyy" id="form-field-2"
                                                   class="form-control" name="to" value="{{app('request')->input('to') }}">
                                        </div>
                                    </div>

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-2">
                                            <a href="#">
                                                <button type="submit" class="btn btn-primary">
                                                    بحث فى هذه الفترة
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
                                    <table class="table table-striped table-hover  " id="sample-table-2">
                                        <thead>
                                        <tr>
                                            <th class="col-to-export text-right">البيان</th>
                                            <th class="col-to-export text-right">اسم الرحله</th>
                                            <th class="col-to-export text-right">اسم العميل</th>
                                            <th class="col-to-export text-right">اسم المورد</th>
                                            <th class="col-to-export text-right">الدفع</th>
                                            <th class="col-to-export text-right">التاريخ</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($results))
                                            @foreach($results as $reas)
                                                <tr>
                                                    <td>{{$reas->type == 1 ?'مبيعات':'مصروفات'}}</td>
                                                    <td>{{App\gm\travel\Model\travel::find($reas->travel_id)->travel_name}}</td>
                                                    <td>{{$reas->parnter_get->name}}</td>
                                                    <td>{{$reas->supp_id}}</td>
                                                    <td>{{$reas->cash}}</td>
                                                    <td>{{$reas->date}}</td>
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
            </div>

            <!-- End -->
        </div>
    </div>


@endsection

@section('script')

    <script>
        /*
        jQuery(document).ready(function() {
            Main.init();
            TableExport.init();
        });*/
    </script>
    <script>
        //function to initiate Select2
        jQuery(document).ready(function () {
            $(".search-select-trip").select2({
                placeholder: "الرحلة ",
                allowClear: true
            });
            $(".search-select-sub").select2({
                placeholder: "اسم العميل  ",
                allowClear: true
            });
            $(".search-select-client").select2({
                placeholder: "اسم المورد ",
                allowClear: true
            });
        });
    </script>

@endsection

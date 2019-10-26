@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section('content')


    <!-- start: PAGE HEADER -->
    <div class="row">
        <div class="col-sm-12">

            <div class="page-header">
                <h3>دليل الرحلات</h3>

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
                    <i class="fa fa-external-link-square"></i> اضافة مبيعات العميل  
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/travels/subscribe/add')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                الرحلة
                            </label>
                            @if(isset($travels))
                                <div class="col-sm-4">
                                    <select name="travel_id" id="form-field-select-3" class="form-control search-select-trip">
                                        <option value="">اختار  الرحله</option>
                                        @foreach($travels as $tra)
                                            <option value="{{$tra->travel_id}}" {{old('travel_id')==$tra->travel_id?'selected':''}}> الاسم : {{$tra->travel_name }} التاريخ
                                                || {{$tra->start_day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <label class="col-sm-2 control-label" for="form-field-1">
                                العميل 
                            </label>
                            @if(isset($partners))
                                <div class="col-sm-4">
                                    <select name="partner_id" id="form-field-select-3" class="form-control search-select-sub">
                                        <option value="">اختار المندوب </option>
                                        @foreach($partners as $partner)
                                            <option value="{{$partner->partner_id}}" {{old('partner_id')==$partner->partner_id?'selected':''}}> اسم العميل : {{$partner->name}} ||
                                                رقم التلفون : {{$partner->phone}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                عدد الافراد
                            </label>
                            <div class="col-sm-4">
                                <input type="number" name="count_of_travel" value="{{old('count_of_travel')}}" placeholder="0" id="form-field-2" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-2">
                                سعر الفرد
                            </label>
                            <div class="col-sm-4">
                                <input type="number" step="0.01" name="prices" value="{{old('prices')}}" placeholder="0" id="form-field-2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"  for="form-field-2">
                                نوع العميل 
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="type" value="{{old('type')}}" placeholder="نوع  العميل " id="form-field-2" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-2">
                                المدفوع
                            </label>
                            <div class="col-sm-4">
                                <input type="number" name="current_paid" step="0.01" value="{{old('current_paid')}}" placeholder="0" id="form-field-2" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <a href="#">
                                    <button type="submit" class="btn btn-primary">
                                        اضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> كشف حساب عميل فى رحلة
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{url('dashboard/admin/travels/subscribe/payment/partner/report')}}" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                الرحلة
                            </label>
                            @if(isset($travels))
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" name="travel-selected" class="form-control search-select-trip2">
                                        <option value="">&nbsp;اختار الرحله</option>
                                        @foreach($travels as $tra)
                                            <option value="{{$tra->travel_id}}"> الاسم : {{$tra->travel_name }} التاريخ
                                                || {{$tra->start_day}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <label class="col-sm-2 control-label" for="form-field-1">
                                العميل 
                            </label>
                                <div class="col-sm-4">
                                    <select id="parrent_idhere"  name="id_state" class="form-control search-select-sub2">
                                        <option value="">&nbsp;</option>
                                    </select>
                                </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
        <div class="col-md-12">
            <!-- start: trip details with subscripers -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> تفاصيل الرحلة بالمناديب
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                    </div>
                </div>
                <div class="panel-body">
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover  table-full-width" id="sample_1">
                            <thead>
                            <tr>
                                <th class=" text-right">اسم الرحلة</th>
                                <th class=" text-right">تاريخ الرحلة</th>
                                <th class=" text-right">اسم العميل</th>
                                <th class=" text-right">حاله الدفع</th>
                                <th class=" text-right">&shy;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($subscribe))
                                @foreach($subscribe as $sub)
                                    <tr>
                                        <td>{{$sub->travel_name}}</td>
                                        <td>{{$sub->start_day}}</td>
                                        <td>{{$sub->name}}</td>
                                        <td>{{$sub->paid==0?'لم يستكمل الدفع':'تم الدفع'}}</td>
                                        <td class="text-left">
                                            <div class="">
                                                <a href="{{url('dashboard/admin/travels/subscribe/reports/'.$sub->travel_id)}}" class="btn btn-xs tab-btn btn-teal tooltips"
                                                   data-placement="top" data-original-title="تقرير مجمع "><i
                                                            class="fa fa-edit"></i></a>
                                                @if($sub->paid==0)
                                                <a href="{{url('dashboard/admin/travels/subscribe/payment/'.$sub->travel_id.'/'.$sub->partner_id)}}" class="btn btn-xs btn-bricky2 tab-btn tooltips"
                                                   data-placement="top" data-original-title="اضافه دفع جديد"><i
                                                            class=" clip-file"></i></a>
                                                    @endif
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end: trip details with subscripers -->
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        $("select[name='travel-selected']").change(function() {
            var travel_id = $(this).val();
            $.get('{{url("dashboard/admin/travels/subscribe/gettravel")}}/'+travel_id,function (data) {
                $('#parrent_idhere').empty();
                $.each(data,function (key, value) {
                        console.log(key);
                        console.log(value);
                    $('#parrent_idhere').append(
                        ' <option value="'+  value +'">'+ key+'</option>'
                    );
                    

                })

                }


            );
        });




    </script>

    <script>
        //function to initiate Select2
        jQuery(document).ready(function () {
            $(".search-select-trip").select2({
                placeholder: "اختر الرحلة ",
                allowClear: true
            });
        });
        jQuery(document).ready(function () {
            $(".search-select-sub").select2({
                placeholder: "اختر العميل   ",
                allowClear: true
            });
        });
        //function to initiate Select2
        jQuery(document).ready(function () {
            $(".search-select-trip2").select2({
                placeholder: "اختر الرحلة ",
                allowClear: true
            });
        });
        /*jQuery(document).ready(function () {
            $(".search-select-sub2").select2({
                placeholder: "اختر العميل   ",
                allowClear: true
            });
        });*/
    </script>
@endsection
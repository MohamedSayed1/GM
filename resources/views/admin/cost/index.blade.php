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

                            @endif
                            <form role="form" class="form-horizontal" action="{{url('dashboard/admin/costs/store')}}"
                                  method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        الرحلة
                                    </label>
                                    <div class="col-sm-2">
                                        <select name="travel_id"
                                                class="form-control search-select-trip">
                                            <option value="">اختار المورد</option>
                                            @foreach($travels as $travel)
                                                <option value="{{$travel->travel_id}}">{{$travel->travel_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        المورد
                                    </label>
                                    <div class="col-sm-2">
                                        <select name="supplier_id"
                                                class="form-control search-select-trip">
                                            <option value="">اختار الرحله</option>
                                            @foreach(\App\gm\cost\Model\Supplier::get() as $sup)

                                                <option value="{{$sup->su_id}}">{{$sup->su_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <!-- new please add this -->
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        نوع التكلفة
                                    </label>
                                    <div class="col-sm-2">
                                        <select id="select_typeOfInput" name="t_type"
                                                class="form-control search-select-cost">
                                            <option value=""></option>
                                            <option value="0">تكلفة عادية</option>
                                            <option value="1">تكلفة سكن</option>
                                        </select>
                                    </div>
                                    <!-- new please add this -->
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        البيان
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name_costs" placeholder="البيان " id="form-field-1"
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
                                <!-- this is default cost -->
                                <div class="form-group" id="typeOfInputAppend">

                                </div>
                                <!-- this is default cost -->


                                <!-- this is hotel cost -->
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
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('dashboard/admin/costs/search')}}" method="post"
                              class="form-horizontal">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" name="travel_id" class="form-control search-trip">
                                        <option name="travel_id">&nbsp;</option>
                                        @foreach($travels as $travel)
                                            <option value="{{$travel->travel_id}}">{{$travel->travel_name}}|| التاريخ
                                                : {{$travel->start_day}}</option>
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
                        </div>
                    </div>
                    <div class="panel-body">
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover  table-full-width" id="sample_1">
                                <thead>
                                <tr>
                                    <th class="col-to-export text-right">اسم الرحلة</th>
                                    <th class="col-to-export text-right">البيان</th>
                                    <th class="col-to-export text-right">نوع التكلفة</th>
                                    <!-- <th class="col-to-export text-right">عدد</th> -->
                                    <th class="col-to-export text-right">السعر</th>
                                    <!-- <th class="col-to-export text-right">العملةبالمصرى</th> -->
                                    <th class="col-to-export text-right">الإجمالى</th>
                                    <th class=" text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($costs as $cost)
                                    <tr>
                                        <td>{{$cost->travel_name}}</td>
                                        <td>{{$cost->name_costs}}</td>

                                        @if($cost->type==0)
                                            <td>تكلفة عادية</td>
                                        @elseif($cost->type==1)
                                            <td>تكلفة سكن</td>
                                        @endif

                                        <td>{{$cost->pound}}</td>
                                        <td>{{$cost->total}}</td>
                                        <td class="text-left">
                                            <a href="{{url('dashboard/admin/costs/update/'.$cost->costs_id)}}"
                                               class="btn btn-xs btn-teal tab-btn tooltips"
                                               data-placement="top"
                                               data-original-title="تعديل "><i class="fa fa-edit"></i></a>
                                            <a onclick="confermDelet({{$cost->costs_id}})">
                                                <button>حذف </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <!-- <tfoot>
                                <tr>
                                    <th class="col-to-export text-right">الاجمالى</th>
                                    <td></td>
                                    <td></td>
                                    <td> 11111</td>
                                    <td></td>
                                </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">


        $(document).ready(function () {
            $('#select_typeOfInput').on('change', function () {

                var value = $('#select_typeOfInput').val();
                $('#typeOfInputAppend').empty();

                if (value == 0) {

                    $('#typeOfInputAppend').append(
                        '<label class="col-sm-2 control-label" for="form-field-1"> العدد </label>' +
                        '<div class="col-sm-4">' +
                        ' <input type="number" name="count" placeholder="0 " id="form-field-1"' +
                        'class = "form-control" > ' +
                        '</div>' +
                        '<label class="col-sm-2 control-label" for="form-field-2">' + 'السعر' +
                        '</label>' +
                        '<div class="col-sm-4">' +
                        '<input type="number" name="unit_price" placeholder="0" id="form-field-2"' +
                        'class = "form-control" >' +
                        '</div>'
                    );
                } else if (value == 1) {

                    $('#typeOfInputAppend').append(
                        ' <label class="col-sm-2 control-label" for="">' + ' عدد الغرف' +
                        ' </label>' +
                        '   <div class="col-sm-2">' +
                        '  <input type="number" name="room_num" placeholder="0 " id="form-field-1"' +
                        'class="form-control">' +
                        ' </div>' +
                        ' <label class="col-sm-2 control-label" for="">' +
                        'عدد الليالى' +
                        ' </label>' +
                        '  <div class="col-sm-2">' +
                        ' <input type="number" name="night_number" placeholder="0 " id="form-field-1"' +
                        ' class="form-control">' +
                        ' </div>' +
                        '  <label class="col-sm-2 control-label" for="">' +
                        'سعر الليلة' +
                        ' </label>' +
                        '<div class="col-sm-2">' +
                        '<input type="number" name="unit_price" placeholder="0" id="form-field-2"' +
                        ' class="form-control">' +
                        '    </div>'
                    );


                } else {
                    $('#typeOfInputAppend').empty();
                }


            });
        })

    </script>
    <script>
        jQuery(document).ready(function () {
            $(".search-select-trip").select2({
                placeholder: "اختر الرحلة ",
                allowClear: true
            });
        });
        jQuery(document).ready(function () {
            $(".search-trip").select2({
                placeholder: "اختر الرحلة ",
                allowClear: true
            });
        });
        jQuery(document).ready(function () {
            $(".search-select-cost").select2({
                placeholder: "اختر  نوع التكلفة  ",
                allowClear: true
            });
        });

        function confermDelet(id)
        {
            swal({
                title: "هل انت متاكد من الحذف ؟؟",
                text: 'الحذف سوف تخسر جميع البيانات الخاصه بالصرف والدفع يمكنك عمل اجراء تصحيح اذا لم تريد خسارتها',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var url= '{{url('dashboard/admin/costs/delete')}}';
                        window.location =url+'/'+id;
                    } else {
                        swal("حسنا لن يتم الحذف ");
                    }
                });
        }

    </script>


@endsection
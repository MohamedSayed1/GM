@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section('content')
    <!-- start: PAGE HEADER -->
    <div class="row">
        <div class="col-sm-12">

            <div class="page-header">
                <h3>مصروفات العميل</h3>

            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>

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
                    <form onsubmit=" return validForm()" role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/travels/subscribe/expenses/add/new/payment')}}">
                        <div id="content_payments">

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                الرحلة
                            </label>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-sm-4">
                                <select id="form-field-select-3" class="form-control search-select-trip"
                                        name="travel_id">
                                    <option value="">اختار الرحله</option>
                                    @foreach($travels as $tra)
                                        <option value="{{$tra->travel_id}}"> الاسم : {{$tra->travel_name }} التاريخ
                                            || {{$tra->start_day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-1">
                                العميل
                            </label>
                            <div class="col-sm-4">
                                <select onchange="getPayed()" id="parrent_idhere" name="partner_id"
                                        class="form-control search-select-sub2">
                                    <option value="">&nbsp;</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                تعديل الاجمالى
                            </label>
                            <div class="col-sm-4">
                                <input type="number" name="cash" placeholder="0" id="form-field-2" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                ملاحظات
                            </label>
                            <div class="col-sm-4">
                            <textarea class="form-control" name="comment">
                                {{old('comment')}}
                            </textarea>
                            </div>
                        </div>

                        <input type="hidden" name="lastpaid" value="">
                        <input type="hidden" name="type" value="2">
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2">
                                <a href="#">
                                    <button  type="submit" class="btn btn-primary">
                                        اضافة
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <ul>ملاحظات :-
                <li>يجب عدم صرف لعميل اكتر مما دفع حتي لا يأثر ذلك علي حسبات الرحله وحساب الرحله للعميل</li>
                <ul>
                    في حالت سوف يقوم العميل بسحب كل امواله
                    <li>اذ كان للعميل في مبيعات الرحله حاجه واحده فقط (( يحذف ذلك من المبيعات ولن يؤثر علي ذلك علي
                        الحسبات
                    </li>
                    <li>اما في حالت كان للعميل اكثر من مبيعات يجب دفع المبيع المراد استرجاء حقه اولا ثم صرفه حتي لا يؤثر
                        علي حسبات العميل
                    </li>
                </ul>

            </ul>

            <!-- end: TEXT FIELDS PANEL -->
        </div>


    </div>


@endsection

@section('script')

    <script>
        jQuery(document).ready(function () {
            Main.init();

            TableData.init();
        });

        //function to initiate Select2
        jQuery(document).ready(function () {
            $(".search-select-trip").select2({
                placeholder: "الرحلة ",
                allowClear: true
            });
            $(".search-select-sub").select2({
                placeholder: "اسم المندوب",
                allowClear: true
            });
        });


        $("select[name='travel_id']").change(function () {
            var travel_id = $(this).val();
            $.get('{{url("dashboard/admin/travels/subscribe/gettravel")}}/' + travel_id, function (data) {
                    $('#parrent_idhere').empty();
                    $.each(data, function (key, value) {
                        $('#parrent_idhere').append(
                            ' <option value="' + value + '">' + key + '</option>'
                        );


                    })
                    getPayed();
                }
            );
        });

        function getPayed() {
            var parent_id = $("select[name='partner_id']").val();
            var travel_id = $("select[name='travel_id']").val();

            $.get('{{url("dashboard/admin/travels/subscribe/expenses/get/details")}}/' + travel_id + '/' + parent_id, function (data) {
                    $('#content_payments').empty();
                    $('#content_payments').append(
                        '<p> اجمالي المستحق ' + data.totla + '</p>' +
                        '<p> المدفوع الحالي ' + data.paid + '</p>'
                    );

                $("input[name='lastpaid']").val(data.paid);
                }
            );
        }

        function validForm() {


            var partnet = $("select[name='partner_id']").val();
            var travel  = $("select[name='travel_id']").val();
            var paid    = $("input[name='cash']").val();
            var last    = $("input[name='lastpaid']").val();

            if(partnet == '')
            {
                alert('يجب اختيار العميل');
                return false;
            }
            if(travel == '')
            {
                alert('يجب اختيار الرحله');
                return false;
            }
           if(paid == '')
            {
                alert('يجب ادخال المبلغ');
                return false;
            }

            if(paid > last)
            {
                alert('لا يمكن صرف اكتر من المدفوع برجاء التأكد من الرقم');
                return false;
            }



        }
    </script>



@endsection

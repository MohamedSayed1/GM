

@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section('content')



<!-- start: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: STYLE SELECTOR BOX -->
        <div id="style_selector" class="hidden-xs close-style">
            <div id="style_selector_container" style="display:block">
                <div class="style-main-title">
                    Style Selector
                </div>
                <div class="box-title">
                    Choose Your Layout Style
                </div>
                <div class="input-box">
                    <div class="input">
                        <select name="layout">
                            <option value="default">Wide</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                </div>
                <div class="box-title">
                    Choose Your Orientation
                </div>
                <div class="input-box">
                    <div class="input">
                        <select name="orientation">
                            <option value="default">Default</option>
                            <option value="rtl">RTL</option>
                        </select>
                    </div>
                </div>
                <div class="box-title">
                    Choose Your Header Style
                </div>
                <div class="input-box">
                    <div class="input">
                        <select name="header">
                            <option value="fixed">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                </div>
                <div class="box-title">
                    Choose Your Footer Style
                </div>
                <div class="input-box">
                    <div class="input">
                        <select name="footer">
                            <option value="default">Default</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                </div>
                <div class="box-title">
                    Backgrounds for Boxed Version
                </div>
                <div class="images boxed-patterns">
                    <a id="bg_style_1" href="#"><img alt="" src="assets/images/bg.png"></a>
                    <a id="bg_style_2" href="#"><img alt="" src="assets/images/bg_2.png"></a>
                    <a id="bg_style_3" href="#"><img alt="" src="assets/images/bg_3.png"></a>
                    <a id="bg_style_4" href="#"><img alt="" src="assets/images/bg_4.png"></a>
                    <a id="bg_style_5" href="#"><img alt="" src="assets/images/bg_5.png"></a>
                </div>
                <div class="box-title">
                    5 Predefined Color Schemes
                </div>
                <div class="images icons-color">
                    <a id="light" href="#"><img class="active" alt="" src="assets/images/lightgrey.png"></a>
                    <a id="dark" href="#"><img alt="" src="assets/images/darkgrey.png"></a>
                    <a id="black-and-white" href="#"><img alt="" src="assets/images/blackandwhite.png"></a>
                    <a id="navy" href="#"><img alt="" src="assets/images/navy.png"></a>
                    <a id="green" href="#"><img alt="" src="assets/images/green.png"></a>
                </div>
                <div style="height:25px;line-height:25px; text-align: center">
                    <a class="clear_style" href="#">
                        Clear Styles
                    </a>
                    <a class="save_style" href="#">
                        Save Styles
                    </a>
                </div>
            </div>
            <div class="style-toggle open">
                <i class="fa fa-cog fa-spin"></i>
            </div>
        </div>
        <!-- end: STYLE SELECTOR BOX -->
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
            <li class="active">
                <i class="clip-home-3"></i>
                <a href="#">
                    اضافة  دفعة لعميل
                </a>
            </li>

            <li class="search-box">
                <form class="sidebar-search">
                    <div class="form-group">
                        <input type="text" placeholder="Start Searching...">
                        <button class="submit">
                            <i class="clip-search-3"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ol>
        <div class="page-header">
            <h3>اضافة دفعة لعميل </h3>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->

    </div>
</div>
<!-- end: PAGE HEADER -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: TEXT FIELDS PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>ادخل الدفعة
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>


                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>

                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/travels/subscribe/payment')}}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover  table-full-width">
                            <thead>
                            <tr>
                                <th class=" text-right">اجمالي المستحق</th>
                                <th class=" text-right">المدفوع حتي الان</th>
                                <th class=" text-right">الباقي</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$total}}</td>
                                <td>{{$pay}}</td>
                                <td>{{$remainder}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            اسم العميل
                        </label>
                        <div class="col-sm-5">
                            <input type="text" disabled="" value="{{$sub->name}}" id="form-field-1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            اسم الرحلة
                        </label>
                        <div class="col-sm-5">
                            <input type="text" disabled="" value="{{$sub->travel_name}}" id="form-field-2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            تاريخ الدفع
                        </label>
                        <div class="col-sm-5">
                            <input type="date"  name="date" value="{{old('date')}}"   id="form-field-2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            قيمة الدفعة
                        </label>
                        <div class="col-sm-5">
                            <input type="number" step="0.01" name="payment" value="{{old('payment')}}" placeholder="0.00"  id="form-field-2" class="form-control">
                        </div>
                    </div>

                    <div id="Showremainder">
                        <div id="haveErrors" style="display:none"></div>

                    </div>

                    <input type="hidden" name="remainder" value="{{$remainder}}">
                    <input type="hidden" name="travel_id" value="{{$sub->travel_id}}">
                    <input type="hidden" name="partner_id" value="{{$sub->partner_id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <div class="col-sm-2" >
                           <button type="submit" id="buttonSub" class="btn btn-primary" disabled>
                                    حفظ
                                </button>
                        </div>
                        <div class="col-sm-2" >
                           <a href="{{url('dashboard/admin/travels/subscribe/index')}}"><button type="button"  class="btn btn-primary">
                               رجوع
                                </button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>
</div>
<!-- end: PAGE CONTENT-->


@endsection

@section('script')
    <script>
    $(document).ready(function(){
        function paystart(){
            var pay = $("input[name='payment']" ).val();

            if(pay != '')
            {

                var rem =$("input[name='remainder']" ).val();
                var equl = Number(rem) - Number(pay);
                $('#Showremainder').empty();
                $('#Showremainder').append(
                    '<p> الباقي بعد الادخال الحالي</p>'+
                    '<p>'+ equl+ '</p>'
                );

                if(equl < 0)
                {
                    $('#Showremainder').css("display","block");
                    $('#Showremainder').css("color","red");
                    $('#Showremainder').append(
                        '<p> لا يمكن ادخال هذه القيمه !!</p>'
                    );
                    $("#buttonSub").attr("disabled", true);
                }else {
                    $("#buttonSub").attr("disabled", false);
                }


            }
            else{
                $('#Showremainder').empty();
                $("#buttonSub").attr("disabled", true);
            }

        }paystart();

        $("input[name='payment']" ).focusout(function(){
            var pay = $("input[name='payment']" ).val();

            if(pay != '')
            {

                var rem =$("input[name='remainder']" ).val();
                var equl = Number(rem) - Number(pay);
                $('#Showremainder').empty();
                $('#Showremainder').append(
                    '<p> الباقي بعد الادخال الحالي</p>'+
                        '<p>'+ equl+ '</p>'
                );

                if(equl < 0)
                {
                    $('#Showremainder').css("display","block");
                    $('#Showremainder').css("color","red");
                    $('#Showremainder').append(
                        '<p> لا يمكن ادخال هذه القيمه !!</p>'
                    );
                    $("#buttonSub").attr("disabled", true);
                }else {
                    $("#buttonSub").attr("disabled", false);
                }


            }
            else{
                $('#Showremainder').empty();
                $("#buttonSub").attr("disabled", true);
            }

        });
    });
    </script>
@endsection
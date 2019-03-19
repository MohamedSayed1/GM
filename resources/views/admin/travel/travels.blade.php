@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section ('content')


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
                                ادارة المستخدمين
                            </a>
                        </li>

                        <li class="search-box">
                            <form class="sidebar-search">
                                <div class="form-group">
                                    <input type="text"  placeholder="Start Searching...">
                                    <button class="submit">
                                        <i class="clip-search-3"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ol>
                    <div class="page-header">
                        <h3>دليل الرحلات</h3>
                        <a href="{{url('dashboard/admin/travel/add')}}"><button type="button" class="btn btn-primary">
                                اضافة رحلة
                            </button></a>
                    </div>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                </div>
            </div>
            <!-- end: PAGE HEADER -->
            <div class="row">
                <div class="col-md-12">
                    <!-- start: trips Details-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-external-link-square"></i> تفاصيل الرحلات
                            <div class="panel-tools">
                                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                                <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                                <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                <thead>
                                <tr>
                                    <th class="text-right">رقم الرحلة</th>
                                    <th class="text-right">اسم الرحلة</th>
                                    <th class="text-right">ناريخ القيام</th>
                                    <th class="text-right">الفندق</th>
                                    <th class="text-right">وسيلة المواصلات</th>
                                    <th class="text-right">تاريخ العودة</th>
                                    <th class="text-right">الحالة </th>
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
                                    <td>{{$travel->hotel_name}}</td>
                                    <td>{{$travel->transportaion}}</td>
                                    <td>{{$travel->end_day}}</td>
                                    <td class="center">{{$travel->is_actvie == 1?'مفعل':'غير مفعل'}}</td>
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{url('dashboard/admin/travel/update/'.$travel->travel_id)}}" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('dashboard/admin/travel/delete/'.$travel->travel_id)}}" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul role="menu" class="dropdown-menu pull-right">
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="update-pass.html">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>

                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="#">
                                                            <i class="fa fa-times"></i> Remove
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end: trips Details -->

                </div>
            </div>

            <!-- end: PAGE CONTENT-->


@endsection
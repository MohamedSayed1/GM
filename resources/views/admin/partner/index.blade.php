@extends('admin.index')
@section('title')
    {{$title}}
@endsection

@section('content')

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
                    <i class="clip-link"></i>
                    <a href="#">
                        ادارة العملاء
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
                <h3>دليل العملاء</h3>
                <a href="{{url('dashboard/admin/partner/view/add')}}"><button type="button" class="btn btn-primary">
                        اضافة عميل
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
                    <i class="fa fa-external-link-square"></i> بيانات العملاء
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
                            <th class="text-right">اسم العميل</th>
                            <th class="text-right">رقم التليفون</th>
                            <th class="text-right">&shy;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($partner))
                            @foreach($partner as $part)
                                <tr>

                                    <td>{{$part->name}}</td>
                                    <td>{{$part->phone}}</td>
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="{{url('dashboard/admin/partner/view/updated/'.$part->partner_id)}}" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
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
@extends('layout.layout')
@section('title')
    Al-Arady ElMokadasa Management System
@endsection
@section('sidebar')
    @include('admin.sidebar')
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
                        <a id="bg_style_1" href="#"><img alt="" src="{{asset('dashboard/assets/images/bg.png')}}"></a>
                        <a id="bg_style_2" href="#"><img alt="" src="{{asset('dashboard/assets/images/bg_2.png')}}"></a>
                        <a id="bg_style_3" href="#"><img alt="" src="{{asset('dashboard/assets/images/bg_3.png')}}"></a>
                        <a id="bg_style_4" href="#"><img alt="" src="{{asset('dashboard/assets/images/bg_4.png')}}"></a>
                        <a id="bg_style_5" href="#"><img alt="" src="{{asset('dashboard/assets/images/bg_5.png')}}"></a>
                    </div>
                    <div class="box-title">
                        5 Predefined Color Schemes
                    </div>
                    <div class="images icons-color">
                        <a id="light" href="#"><img class="active" alt="" src="{{asset('dashboard/assets/images/lightgrey.png')}}"></a>
                        <a id="dark" href="#"><img alt="" src="{{asset('dashboard/assets/images/darkgrey.png')}}"></a>
                        <a id="black-and-white" href="#"><img alt="" src="{{asset('dashboard/assets/images/blackandwhite.png')}}"></a>
                        <a id="navy" href="#"><img alt="" src="{{asset('dashboard/assets/images/navy.png')}}"></a>
                        <a id="green" href="#"><img alt="" src="{{asset('dashboard/assets/images/green.png')}}"></a>
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
                        Home
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
                <h3> الرئيسية </h3>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>




@endsection

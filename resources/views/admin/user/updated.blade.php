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
                    <a href="{{url('dashboard/admin/users')}}">
                        ادارة المستخدمين
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
                <h3> ادارة المستخدمين  </h3>

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
                    <i class="fa fa-external-link-square"></i>ادخل بيانات المستخدم
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>


                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    </div>
                    @endif
                    <form role="form" class="form-horizontal" action="{{url('dashboard/admin/users/updated')}}" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم الدخول
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="username" value="{{old('username')!==null?old('username'):$users->username}}" placeholder="اسم الدخول" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم المستخدم
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="name" value="{{old('name')!==null?old('name'):$users->name}}" placeholder="اسم المستخدم" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                صلاحية المستخدم
                            </label>
                            <div class="col-sm-5">
                                @if(isset($groups))
                                <select name="group_id" id="form-field-select-1" class="form-control">
                                    @foreach($groups as $group)
                                    <option value="{{$group->group_id}}"
                                            @if(old('group_id')!==null)
                                             {{old('group_id')==$group->group_id?'selected':''}}
                                            @else
                                                {{$users->group_id==$group->group_id?'selected':''}}
                                             @endif

                                    >{{$group->group_name}}</option>
                                    @endforeach

                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الحالة
                            </label>
                            <div class="col-sm-5">
                                <select name="is_active" id="form-field-select-1" class="form-control">
                                    <option value="1"
                                            @if(old('is_active')!==null)
                                            {{old('is_active')==1?'selected':''}}
                                            @else
                                                {{$users->is_actvie==1?'selected':''}}
                                            @endif
                                    >نشط </option>
                                    <option value="0"
                                    @if(old('is_active')!==null)
                                           {{old('is_active')==0?'selected':''}}
                                        @else
                                          {{$users->is_actvie==0?'selected':''}}
                                    @endif
                                    >غير نشط</option>
                                </select>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{$users->id}}">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2" >
                                <button type="submit" class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>


@endsection
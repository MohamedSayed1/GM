@extends('admin.index')
@section('title')
    {{$title}}
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            
            <div class="page-header">
                <h3> اضافة عميل  </h3>
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
                    <i class="fa fa-external-link-square"></i>ادخل بيانات العميل
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/partner/view/add')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم العميل
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="اسم العميل" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الرقم التليفون
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="phone" value="{{old('phone')}}" placeholder="رقم التلفون" id="form-field-2" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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

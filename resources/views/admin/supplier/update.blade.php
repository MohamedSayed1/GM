@extends('admin.index')
@section('title')
    {{$title}}
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            
            <div class="page-header">
                <h3> تعديل بيانات المورد  </h3>
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
                    <i class="fa fa-external-link-square"></i>تعديل بيانات المورد
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
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/supplier/view/updated')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم المورد
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="su_name" value="{{old('su_name')!==null?old('su_name'):$supplier->su_name}}" placeholder="اسم المورد" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                الرقم التليفون
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="su_phone" value="{{old('su_phone')!==null?old('su_phone'):$supplier->su_phone}}" placeholder="رقم التلفون" id="form-field-2" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="su_id" value="{{$supplier->su_id}}">
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

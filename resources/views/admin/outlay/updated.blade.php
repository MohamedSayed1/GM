@extends('admin.index')
@section('title')
    {{$title}}
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">


            <div class="page-header">
                <h3>المصاريف </h3>
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
                    <i class="fa fa-external-link-square"></i> ادخل  التفاصيل
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>


                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="fa fa-resize-full"></i>
                        </a>

                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post" action="{{url('dashboard/admin/outlay/view/updated')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                البيان
                            </label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="البيان " name="name" value="{{old('name')!==null?old('name'):$outliy->outlay_name}}" id="form-field-1" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-1">
                                العدد
                            </label>
                            <div class="col-sm-4">
                                <input type="number" placeholder="0 " name="count" value="{{old('count')!==null?old('count'):$outliy->count}}" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                القيمة
                            </label>
                            <div class="col-sm-4">
                                <input type="number" placeholder="0" name="value"  value="{{old('value')!==null?old('value'):$outliy->value}}" id="form-field-2" class="form-control">
                            </div>
                            <label class="col-sm-2 control-label" for="form-field-2">
                                التاريخ
                            </label>
                            <div class="col-sm-4">
                                <input type="date" placeholder="dd-mm-yyyy" name="date"  value="{{old('date')!==null?old('date'):$outliy->date}}" id="form-field-2" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$outliy->outlay_id}}">
                        <div class="form-group">
                            <div class="col-sm-2 col-sm-offset-2" >
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
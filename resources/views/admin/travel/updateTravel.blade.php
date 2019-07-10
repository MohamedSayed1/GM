@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-12">
            <!-- start: TEXT FIELDS PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i>ادخل بيانات الرحلة
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
                    <form role="form" class="form-horizontal" action="{{url('dashboard/admin/travel/update')}}" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                اسم الرحلة
                            </label>
                            <div class="col-sm-5">
                                <input type="text" name="travel_name" value="{{$travel->travel_name}}" placeholder="اسم الرحلة" id="form-field-1" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                تاريخ القيام
                            </label>
                            <div class="col-sm-5">
                                <input type="date" name="start_day" value="{{$travel->start_day}}" placeholder="تاريخ القيام" id="form-field-2" class="form-control">
                            </div>
                        </div>




                            <input type="hidden" name="travel_id" value="{{$travel->travel_id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <div class="col-sm-2" >
                                <div class="col-sm-2" >
                                    <button type="submit" class="btn btn-primary">
                                        تعديل رحله
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end: TEXT FIELDS PANEL -->
        </div>
    </div>



@endsection
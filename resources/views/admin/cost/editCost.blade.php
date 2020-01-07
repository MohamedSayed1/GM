@extends('admin.index')
@section('title')

@endsection


@section('content')
    <div class="row">
        <div class="col-sm-12">


            <div class="page-header">
                <h3>تكاليف الرحلات </h3>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>


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
                <div class="panel-body">
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
                <form role="form" class="form-horizontal" action="{{url('dashboard/admin/costs/edit')}}"
                      method="post">
                    {{ method_field('put') }}
                    @if(isset($cost))
                        @foreach($cost as $cost)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" name="travel_id"
                                            class="form-control search-select-trip">
                                        @foreach($travels as $travel)
                                            @if($travel->travel_id==$cost->travel_id)
                                                <option value="{{$travel->travel_id}}"
                                                        selected>{{$cost->travel_name}}</option>
                                            @else
                                                <option value="{{$travel->travel_id}}">
                                                    {{$travel->travel_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    المورد
                                </label>
                                <div class="col-sm-4">
                                    <select name="supplier_id"
                                            class="form-control search-select-trip">
                                        <option value="">اختار المورد</option>
                                        @foreach(\App\gm\cost\Model\Supplier::get() as $sup)
                                            @if($sup->su_id==$cost->supplier_id)
                                                <option value="{{$sup->su_id}}" selected>{{$sup->su_name}}</option>
                                            @else
                                                <option value="{{$sup->su_id}}">{{$sup->su_name}}</option>
                                            @endif


                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label" for="form-field-1">
                                    البيان
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="name_costs" value="{{$cost->name_costs}}"
                                           placeholder="البيان "
                                           id="form-field-1"
                                           class="form-control">
                                </div>


                                <label class="col-sm-2 control-label" for="form-field-2">
                                    سعر العملة بالمصرى
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" name="pound" value="{{$cost->pound}}" placeholder="0"
                                           id="form-field-2"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                @if($cost->type==0)
                                    <label class="col-sm-2 control-label" for="form-field-2">
                                        سعر الوحدة الواحدة
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" name="unit_price" value="{{$cost->unit_price}}"
                                               placeholder="0"
                                               id="form-field-2"
                                               class="form-control">
                                    </div>

                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        العدد
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="number" name="count" value="{{$cost->count}}" placeholder="0 "
                                               id="form-field-1"
                                               class="form-control">
                                    </div>
                                @elseif($cost->type==1)
                                    <label class="col-sm-2 control-label" for="form-field-2">
                                        سعر الليلة
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="number" name="unit_price" value="{{$cost->unit_price}}"
                                               placeholder="0"
                                               id="form-field-2"
                                               class="form-control">
                                    </div>

                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        عدد الليالى
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="number" name="night_number" value="{{$cost->night_number}}"
                                               placeholder="0 "
                                               id="form-field-1"
                                               class="form-control">
                                    </div>
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        عدد الغرف
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="number" name="room_num" value="{{$cost->room_num}}"
                                               placeholder="0 "
                                               id="form-field-1"
                                               class="form-control">
                                    </div>
                                @endif
                            </div>

                            <input type="hidden" name="costs_id" value="{{$cost->costs_id}}">
                            <input type="hidden" name="t_type" value="{{$cost->type}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2">

                                    <button type="submit" class="btn btn-primary">
                                        تعديل التكلفة
                                    </button>

                                </div>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
        <!-- end: TEXT FIELDS PANEL -->
    </div>
@endsection
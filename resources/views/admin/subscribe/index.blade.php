@extends('admin.index')
@section ('title')
    {{$title}}
@endsection

@section('content')


        <!-- start: PAGE HEADER -->
    <div class="row">
            <div class="col-sm-12">

                <div class="page-header">
                    <h3>دليل الرحلات</h3>

                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
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
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" class="form-control search-select-trip">
                                        <option value="">&nbsp;</option>
                                        <option value="AL">محسن عبد السلام</option>
                                        <option value="AK">محسن عبد السلام</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    المندوب
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" class="form-control search-select-sub">
                                        <option value="">&nbsp;</option>
                                        <option value="AL">محسن عبد السلام</option>
                                        <option value="AK">محسن عبد السلام</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    عدد الافراد
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" placeholder="0" id="form-field-2" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    سعر الفرد
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" placeholder="0" id="form-field-2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    سعر العملة بالجنيه
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" placeholder="0" id="form-field-2" class="form-control">
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-2">
                                    المدفوع
                                </label>
                                <div class="col-sm-4">
                                    <input type="number" placeholder="0" id="form-field-2" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2" >
                                    <a href="#"><button type="submit" class="btn btn-primary">
                                            اضافة
                                        </button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> كشف حساب عميل فى رحلة
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>


                            <a class="btn btn-xs btn-link panel-expand" href="#">
                                <i class="fa fa-resize-full"></i>
                            </a>

                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    الرحلة
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" class="form-control search-select-trip">
                                        <option value="">&nbsp;</option>
                                        <option value="AL">محسن عبد السلام</option>
                                        <option value="AK">محسن عبد السلام</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    المندوب
                                </label>
                                <div class="col-sm-4">
                                    <select id="form-field-select-3" class="form-control search-select-sub">
                                        <option value="">&nbsp;</option>
                                        <option value="AL">محسن عبد السلام</option>
                                        <option value="AK">محسن عبد السلام</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-2" >
                                    <a href="#"><button type="submit" class="btn btn-primary">
                                            بحث
                                        </button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
            <div class="col-md-12">
                <!-- start: trip details with subscripers -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> تفاصيل الرحلة بالمناديب
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                            <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a>
                            <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                            <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                            <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover  table-full-width" id="sample_1">
                                <thead>
                                <tr>
                                    <th class=" text-right">اسم الرحلة </th>
                                    <th class=" text-right">تاريخ الرحلة </th>
                                    <th class=" text-right">اسم العميل </th>
                                    <th class=" text-right">عدد الافراد </th>
                                    <th class=" text-right">سعر الفرد </th>
                                    <th class=" text-right">سعر العملة </th>
                                    <th class=" text-right">الاجمالى </th>
                                    <th class=" text-right">المدفوع </th>
                                    <th class=" text-right">الباقى </th>
                                    <th class=" text-right">&shy;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td>عمرة شعبان </td>
                                    <td>محسن عبد السلام</td>
                                    <td>15 فرد </td>
                                    <td>5 نجوم</td>
                                    <td>9000 </td>
                                    <td>8000 </td>
                                    <td>1000 </td>
                                    <td>1</td>
                                    <td class="center">
                                        <div class="">
                                            <a href="update-pass.html" class="btn btn-xs tab-btn btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                                            <a href="#" class="btn btn-xs btn-bricky2 tab-btn tooltips" data-placement="top" data-original-title="طباعة  كشف الحساب  "><i class=" clip-stackoverflow"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td> 1 </td>
                                    <td>عمرة شعبان </td>
                                    <td>محسن عبد السلام</td>
                                    <td>15 فرد </td>
                                    <td>5 نجوم</td>
                                    <td>9000 </td>
                                    <td>8000 </td>
                                    <td>1000 </td>
                                    <td>1</td>
                                    <td class="center">
                                        <div class="">
                                            <a href="update-pass.html" class="btn btn-xs tab-btn btn-teal tooltips" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                                            <a href="#" class="btn btn-xs btn-bricky2 tab-btn tooltips" data-placement="top" data-original-title="طباعة  كشف الحساب  "><i class=" clip-stackoverflow"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: trip details with subscripers -->
            </div>
        </div>


@endsection
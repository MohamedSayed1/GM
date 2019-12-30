<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="" />
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="Al-Arady ElMokadasa Management System" name="description" />
    <meta content="Al-Arady ElMokadasa Management System" name="auther" />
    <!-- end: META -->
    <style type="text/css">

        body {margin: 0;padding: 0;font-family: sans-serif;}
        table {box-sizing: content-box;width: 100%;margin: 0 auto;clear: both;border-collapse: separate;border-spacing: 0;margin-top: 6px !important;bottom: 6px !important;max-width: none !important;background-color: transparent;direction: rtl;text-align: right;}
        table thead tr {color: #000;font-weight: 400;box-sizing: border-box;}
        table thead tr th {padding: 8px 10px;border-bottom: 1px solid #111;font-weight: bold;vertical-align: right;line-height: 1.42857143;border-top: 1px #ddd;}
        table tbody tr {background-color: #f9f9f9;}
        table tbody tr td {padding: 8px 10px;vertical-align: middle;line-height: 1.42857143;border-top: 1px solid #ddd;}
        .container {width: 96%;margin: 20px auto;}
        .report-top-header {width: 100%;height: 50px;margin-bottom: 10px;}
        .left-side {float: left;width: 30%;text-align: left;font-size: 16px;font-weight: 700;color: #555}
        .right-side {float: right;width: 65%;text-align: right;font-size: 16px;font-weight: 700;color: #555}
        .header {width: 100%;text-align: center;}
        .header h3 {font-size: 24px;font-weight: 700;color: #444;}

    </style>
</head>

<body class="">
<div class="container">
    <div class="report-top-header">
        <div class="left-side">{{ date('Y-m-d')}}</div>
        <div class="right-side">الاراضى المقدسة </div>
        <div class="col-sm-2" >
            <a href="{{url('dashboard/admin/travels/subscribe/index')}}" onclick="return confirm('Are you sure?')"><button type="button"  class="btn btn-primary">
                    رجوع
                </button></a>
        </div>
    </div>
    <div class="header">
        <h3>اسم الرحله </h3>
        <h3>{{$travels->travel_name}} </h3>

    </div>
    <div class="report-body">
        <table>
            <thead>
            <tr>
                <th>اسم المندوب </th>
                <th>النوع </th>
                <th> عدد الافراض </th>
                <th> السعر</th>
                <th>المستحق</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->type}} </td>
                <td>{{$row->count_of_travel}} </td>
                <td>{{$row->prices}} </td>
                <td>{{$row->total}} </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

    </div>
    <div class="report-body">
        <table>
            <thead>
            <tr>
                <th>اسم المندوب </th>
                <th></th>
                <th>اجمالي عدد الافراض </th>
                <th>اجمالي السعر</th>
                <th>المستحق</th>
                <th>المدفوع</th>
                <th>الباقي</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribs as $sub)
            <tr>
                <td>{{$sub->name}}</td>
                <td></td>
                <td>{{$sub->count_of_travel_new}} </td>
                <td>{{$sub->prices}} </td>
                <td>{{$sub->amont}} </td>
                <td>{{App\gm\Partner_payment::myPeyments($sub->travel_id,$sub->partner_id)}} </td>
                <td>{{App\gm\Partner_payment::restMoney($sub->travel_id,$sub->partner_id)}} </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <h2>المصروفات للعملاء </h2>
        <table>
            <thead>
            <tr>
                <th>اسم المندوب </th>
                <th></th>
                <th>اجمالي الصرف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($safe as $v)
                <tr>
                    <td>{{$v->name}}</td>
                    <td></td>
                    <td>{{$v->amont}} </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <hr>
        <h2>الاجمالي</h2>
        <table>
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>اجمالي المستحق الحالي</th>
                <th>اجمالي المدفوع الحالي</th>
                <th>اجمالي الباقي</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                @php
                 $total=   App\gm\Partner_payment::totalToTravel($travels->travel_id);
                @endphp
                <td>{{$total}}</td>
                <td>{{App\gm\Partner_payment::TravelPaidall($travels->travel_id)}}</td>
                <td>{{App\gm\Partner_payment::Travelremainder($travels->travel_id)}}</td>
            </tr>

            </tbody>
        </table>
        <h2>الاجمالي المستحق مع المصروفات</h2>
        <table>
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>اجمالي المستحق الحالي</th>
                <th>اجمالي المصروفات</th>
                <th>المكسب النهائي</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{$total}}</td>
                <td>{{$total_safe}}</td>
                <td> {{$total - $total_safe}}</td>

            </tr>

            </tbody>
        </table>
        <div class="col-sm-2" >
            <a href="{{url('dashboard/admin/travels/subscribe/index')}}"><button type="button"  class="btn btn-primary">
                    رجوع
                </button></a>
        </div>
    </div>
</div>
</div>

</body>

</html>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>Al-Arady ElMokadasa Management System</title>
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
            <a href="{{url('dashboard/admin/partner/view')}}"><button type="button"  class="btn btn-primary">
                    رجوع
                </button></a>
        </div>
    </div>
    <div class="header">
        <h3>اسم العميل </h3>
        <h3>{{$partner->name}} </h3>
    </div>
    <hr>
    @if(count($allTravel)==0)
        <h2 style="text-align: center;">لا يوجد شئ لعرضه</h2>
    @else
    <div class="report-body">
        <table>
            <thead>
            <tr>
                <th>اسم المندوب </th>
                <th>اسم الرحله </th>

                <th>اجمالي عدد الافراض </th>
                <th>اجمالي السعر</th>
                <th>المستحق</th>
                <th>المدفوع</th>
                <th>الباقي</th>
            </tr>
            </thead>
            <tbody>

            @foreach($allTravel as $travel)
                <tr>
                    <td>{{$travel->name}}</td>
                    <td>{{$travel->travel_name}}</td>
                    <td>{{$travel->count_of_travel_new}} </td>
                    <td>{{$travel->prices}} </td>
                    <td>{{$travel->amont}} </td>
                    <td>{{App\gm\Partner_payment::myPeyments($travel->travel_id,$travel->partner_id)}} </td>
                    <td>{{App\gm\Partner_payment::restMoney($travel->travel_id,$travel->partner_id)}} </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
        <hr>
    @endif


        <div class="col-sm-2" >
            <a href="{{url('dashboard/admin/partner/view')}}"><button type="button"  class="btn btn-primary">
                    رجوع
                </button></a>
        </div>


</div>
</div>

</body>

</html>
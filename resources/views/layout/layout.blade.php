 <!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="" />
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="Al-Arady ElMokadasa Management System" name="description" />
    <meta content="Al-Arady ElMokadasa Management System" name="AMS" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <!-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/> -->
    <!--  <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Raleway:400,100,200,300,500/" /> -->
    <link type="text/css" rel="stylesheet" href="{{asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('template/bower_components/font-awesome/css/font-awesome.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('template/assets/fonts/clip-font.min.css')}}" />
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('template/bower_components/iCheck/skins/all.css')}}" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('template/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" /> -->
    <link type="text/css" rel="stylesheet" href="{{asset('template/bower_components/sweetalert/dist/sweetalert.css')}}" /><!--  -->
    <link type="text/css" rel="stylesheet" href="{{asset('template/assets/css/main.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('template/assets/css/rtl-version.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('template/assets/css/main-responsive.min.css')}}" />
    <link type="text/css" rel="stylesheet" media="print" href="{{asset('template/assets/css/print.min.css')}}" />
    <link type="text/css" rel="stylesheet" id="skin_color" href="{{asset('template/assets/css/theme/light.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('template/assets/css/prof-style-kh.css')}}" />
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- <link href="{{asset('template/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" /> -->
    <link href="{{asset('template/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('template/bower_components/datatables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>

<body class="rtl">

<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <!-- end: RESPONSIVE MENU TOGGLER -->
            <!-- start: LOGO -->
            <a class="navbar-brand" href="#">
                الاراضى المقدسة
            </a>
            <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">

                <!-- end: MESSAGE DROPDOWN -->
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                        <img src="{{asset('template/assets/images/avatar-1-small.jpg')}}" class="circle-img" alt="">
                        <span class="username">Peter Clark</span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                 <li>
                        <li>
                            <a href="{{url('logout')}}">
                                <i class="clip-exit"></i> &nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
                <!-- start: PAGE SIDEBAR TOGGLE -->
                <!--<li>
                    <a class="sb-toggle" href="#"><i class="fa fa-outdent"></i></a>
                </li>-->
                <!-- end: PAGE SIDEBAR TOGGLE -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    @yield('sidebar')

    <!-- start: PAGE -->
    <div class="main-content">

        <!-- end: SPANEL CONFIGURATION MODAL FORM -->
        <div class="container">
            <!-- start: PAGE HEADER -->

           @yield('content')

            <!-- end: PAGE CONTENT-->
        </div>
    </div>
    <!-- end: PAGE -->
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<div class="footer clearfix">
    <div class="footer-inner">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Al-Arady ElMokadasa Management System By AMS
    </div>
    <div class="footer-items">
        <span class="go-top"><i class="clip-chevron-up"></i></span>
    </div>
</div>
<!-- end: FOOTER -->


<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">Event Management</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                    Close
                </button>
                <button type="button" class="btn btn-danger remove-event no-display">
                    <i class='fa fa-trash-o'></i> Delete Event
                </button>
                <button type='submit' class='btn btn-success save-event'>
                    <i class='fa fa-check'></i> Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="{{asset('template/bower_components/respond/dest/respond.min.js')}}"></script>
<script src="{{asset('template/bower_components/Flot/excanvas.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-1.x/dist/jquery.min.js')}}"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="{{asset('template/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!--<![endif]-->

<script type="text/javascript" src="{{asset('template/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/blockUI/jquery.blockUI.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/jquery.cookie/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('template/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/assets/js/min/main.min.js')}}"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('template/bower_components/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('template/bower_components/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('template/bower_components/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('template/assets/plugin/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('template/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('template/bower_components/jqueryui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('template/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('template/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('template/assets/js/min/index.min.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: JAVASCRIPTS REQUIRED FOR DATA TABLES-->
<script src="{{asset('template/bower_components/bootbox.js/bootbox.js')}}"></script>
<script src="{{asset('template/bower_components/jquery-mockjax/dist/jquery.mockjax.min.js')}}"></script>
<script src="{{asset('template/bower_components/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('template/bower_components/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('template/bower_components/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('template/bower_components/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables/media/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('template/assets/js/min/table-data.min.js')}}"></script>
<script src="{{asset('template/assets/js/min/table-export.min.js')}}"></script>
<script src="{{asset('template/assets/js/form-elements.js')}}"></script>
<!-- start: JAVASCRIPTS REQUIRED FOR DATA TABLES-->
<script>
    jQuery(document).ready(function() {
        Main.init();
        TableData.init();
        TableExport.init();
    });
</script>
<script>
    //function to initiate Select2
    jQuery(document).ready(function () {
        $(".search-select").select2({
            placeholder: "اسم المندوب",
            allowClear: true
        });
    });
    $(document).ready( function() {
        $('#masge').delay(5000).fadeOut();
    });
</script>

</body>

</html>

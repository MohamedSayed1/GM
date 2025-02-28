<div class="navbar-content">
    <!-- start: SIDEBAR -->
    <div class="main-navigation navbar-collapse collapse">
        <!-- start: MAIN MENU TOGGLER BUTTON -->
        <div class="navigation-toggler">
            <i class="clip-chevron-left"></i>
            <i class="clip-chevron-right"></i>
        </div>
        <!-- end: MAIN MENU TOGGLER BUTTON -->
        <!-- start: MAIN NAVIGATION MENU -->
        <ul class="main-navigation-menu">
            <li  class="{{ Request::is('dashboard/admin') ? 'active' : '' }}">
                <!--active open-->
                <a href="{{url('dashboard/admin')}}">
                    <i class="clip-home-3"></i>
                    <span class="title"> الرئيسية  </span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/admin/partner/view*') ? 'active' : '' }}">
                <a href="{{url('dashboard/admin/partner/view')}}">
                    <i class="clip-spinner"></i>
                    <span class="title">ادارة العملاء</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/admin/supplier/view*') ? 'active' : '' }}">
                <a href="{{url('dashboard/admin/supplier/view')}}">
                    <i class="clip-spinner"></i>
                    <span class="title">إدارة الموردين</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/admin/travels*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="clip-link"></i>
                    <span class="title">دليل الرحلات</span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ Request::is('dashboard/admin/travels/all/*') ? 'active' : '' }}">
                        <a href="{{url('dashboard/admin/travels/all')}}">
                            <span class="title">الرحلات</span>
                            <!--<span class="badge badge-new">new</span>-->
                        </a>
                    </li>

                    <li class="{{ Request::is('dashboard/admin/travels/subscribe/*') ? 'active' : '' }}">
                        <a href="{{(url('dashboard/admin/travels/subscribe/index'))}}" class="">
                            <span class="title">مبيعات العميل </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('dashboard/admin/travels/subscribe/expenses*') ? 'active' : '' }}">
                        <a href="{{(url('dashboard/admin/travels/subscribe/expenses'))}}" class="">
                            <span class="title">مصروفات لعميل</span>
                        </a>
                    </li>

                    <!--<li>
                        <a href="">
                            <span class="title"> LTR Version </span>
                        </a>
                    </li>-->
                </ul>
            </li>


            <li class="{{ Request::is('dashboard/admin/costs*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="clip-link"></i>
                    <span class="title">تكاليف الرحلات </span><i class="icon-arrow"></i>

                </a>
                <ul class="sub-menu">
                    <li class="{{ Request::is('dashboard/admin/costs/*') ? 'active' : '' }}">
                        <a href="{{url('dashboard/admin/costs/index')}}">
                            <span class="title">دليل تكلفة الرحلة </span>


                        </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('dashboard/admin/outlay/view*') ? 'active' : '' }}">
                <a href="{{url('dashboard/admin/outlay/view')}}">
                    <i class="fa  fa-money"></i>
                    <span class="title">المصاريف </span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="{{ Request::is('dashboard/admin/users*') ? 'active' : '' }}">
                <a href="{{url('dashboard/admin/users')}}">
                    <i class="clip-user"></i>
                    <span class="title"> ادارة المستخدمين   </span>
                </a>
            </li>
        </ul>
        <!-- end: MAIN NAVIGATION MENU -->
    </div>
    <!-- end: SIDEBAR -->
</div>

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
            <li class="{{ Request::is('dashboard/admin') ? 'active' : '' }}">
                <!--active open-->
                <a href="{{url('dashboard/admin')}}">
                    <i class="clip-home-3"></i>
                    <span class="title"> الرئيسية  </span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/admin/partner/view*') ? 'active' : '' }}">
                <a href="{{url('dashboard/admin/partner/view')}}">
                    <i class="clip-spinner"></i>
                    <span class="title">ادارة العملاء</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="clip-link"></i>
                    <span class="title">دليل الرحلات</span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{url('dashboard/admin/travels')}}">
                            <span class="title">الرحلات</span>
                            <!--<span class="badge badge-new">new</span>-->
                        </a>
                    </li>
                    <li>
                        <a href="{{url('dashboard/admin/travel/add')}}" class="">
                            <span class="title"> اضافة رحلة </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{(url('dashboard/admin/subscribe/all'))}}" class="">
                            <span class="title">  تفاصيل الرحلة بالمناديب  </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL('dashboard/admin/subscribe/add')}}" class="">
                            <span class="title">اضافة تفاصيل الرحلة</span>
                        </a>
                    </li>
                    <!--<li>
                        <a href="">
                            <span class="title"> LTR Version </span>
                        </a>
                    </li>-->
                </ul>
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

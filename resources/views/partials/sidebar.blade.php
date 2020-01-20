@if(\Auth::check())
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>students</span>
                    </a>
                    <ul class="sub">
                        <li><a href="">list</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file"></i>
                        <span>courses</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('course.list')}}">list</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="{{route('logout')}}">
                        <i class="fa fa-power-off"></i>
                        <span>logout</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
@endif

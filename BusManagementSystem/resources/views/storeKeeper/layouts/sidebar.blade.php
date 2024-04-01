<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Report and Analytics</li>

                <li>
                    <a href="{{route('storekeeper.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboards</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                        <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                        <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                        <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                        <li><a href="layouts-boxed.html">Boxed Width</a></li>
                        <li><a href="layouts-preloader.html">Preloader</a></li>
                        <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Bus Management</li>
                <li>
                    <a href="{{route('storekeeper.register')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Register Buses</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('storekeeper.busManage')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Manage Buses </span>
                    </a>
                </li>


                <li class="menu-title">Spare Parts Management</li>
                
                <li>
                    <a href="{{route('storekeeper.registerSpares')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Register SpareParts</span>
                    </a>
                </li>



                <li>
                    <a href="{{route('storekeeper.useSpare')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Use Spare Parts </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('storekeeper.spareManage')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right">New</span>
                        <span>Manage Spare Parts </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<aside class="sidebar ">
    <div class="container-fluid">
        <!--[ sidebar:: menu list ]-->
        <div class="flex-grow-1">
            <ul class="menu-list mt-3 rounded-4">
                <!--[ Start:: brand logo and name ]-->
                <li class="brand-icon mb-3 py-1">
                    <a href="{{ route('home') }}">
                        <span class="fs-5 ms-2">Consultify</span>
                    </a>
                </li>
                <!--[ Start:: dashboard ]-->
                <!--[ Start:: dashboard ]-->
                @auth('web')
                    <li>
                        <a class="m-link" href="{{ route('admin.home') }}">
                            <i class="fa fa-pie-chart" aria-hidden="true"></i>
                            <span class="mx-3">Dashboard</span>
                        </a>
                    </li>
                    @if ($authUser->is_admin)
                        {{-- <li class="collapsed">
                            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_user" href="{{ route('admin.user') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="mx-3">User</span>
                                <span class="arrow fa fa-angle-down ms-auto text-end"></span>
                            </a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu_user">
                                <li><a class="ms-link" href="{{ route('admin.user.create') }}">Create</a></li>
                                <li><a class="ms-link" href="{{ route('admin.user') }}">List</a></li>
                            </ul>
                        </li> --}}
                        <li class="collapsed">
                            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_consultant" href="{{ route('admin.consultant') }}">
                                <i class="fa fa-consultants" aria-hidden="true"></i>
                                <span class="mx-3">Consultant</span>
                                <span class="arrow fa fa-angle-down ms-auto text-end"></span>
                            </a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu_consultant">
                                <li><a class="ms-link" href="{{ route('admin.consultant.create') }}">Create</a></li>
                                <li><a class="ms-link" href="{{ route('admin.consultant') }}">List</a></li>
                            </ul>
                        </li>
                        <li class="collapsed">
                            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_service" href="{{ route('admin.service') }}">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="mx-3">Services</span>
                                <span class="arrow fa fa-angle-down ms-auto text-end"></span>
                            </a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu_service">
                                <li><a class="ms-link" href="{{ route('admin.service.create') }}">Create</a></li>
                                <li><a class="ms-link" href="{{ route('admin.service') }}">List</a></li>
                            </ul>
                        </li>
                    @endif
                    <!--<li>-->
                    <!--    <a class="m-link" href="{{ route('admin.contact') }}">-->
                    <!--        <i class="fa fa-comment"></i>-->
                    <!--        <span class="mx-3">Contact Requests</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a class="m-link" href="{{ route('admin.profileUpdate') }}">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span class="mx-3">Settings</span>
                        </a>
                    </li>
                @endauth
                    
                @auth('consultant')
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_calendar" href="{{ route('admin.calendar') }}">
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                            <span class="mx-3">Calendar</span>
                            <span class="arrow fa fa-angle-down ms-auto text-end"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu_calendar">
                            <li><a class="ms-link" href="{{ route('admin.calendar.create') }}">Create</a></li>
                            <li><a class="ms-link" href="{{ route('admin.calendar.bulkcreate') }}">Create Bulk</a></li>
                            <li><a class="ms-link" href="{{ route('admin.calendar') }}">List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="m-link" href="{{ route('admin.booking') }}">
                            <i class="fa fa-money"></i>
                            <span class="mx-3">Booking</span>
                        </a>
                    </li>
                @endauth
                <li>
                    <a class="m-link" href="{{ route('logout') }}">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span class="mx-3">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

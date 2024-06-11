<div class="app-header d-flex align-items-center">

    <!-- Container starts -->
    <div class="container">

        <!-- Row starts -->
        <div class="row">
            <div class="col-md-3 col-2">

                <!-- App brand starts -->
                <div class="app-brand">
                    <a href="index.html" class="d-lg-flex align-items-center  gap-4 d-none">
                        <img src="{{asset('assets/images/logo.png')}}" class="logo" alt="Logo" /> <h4 class="text-white">Vallacar Transit</h4>
                    </a>
                    <a href="index.html" class="d-lg-none d-md-block">
                        <img src="{{asset('assets/images/logo-text.png')}}" class="logo" alt="Logo" />
                    </a>
                </div>
                <!-- App brand ends -->

            </div>

            <div class="col-md-9 col-10">
                <!-- App header actions start -->
                <div class="header-actions d-flex align-items-center justify-content-end">

                    <div class="dropdown d-sm-flex d-none">
                        <a class="dropdown-toggle d-flex p-3 position-relative" href="#!" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-mail fs-4 lh-1"></i>
                            <span class="count rounded-circle bg-danger">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                            <h5 class="fw-semibold px-3 py-2 m-0">Messages</h5>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <div class="p-3 bg-danger rounded-circle me-3">
                                        MS
                                    </div>
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Moory Sammy</h6>
                                        <p class="mb-1">Sent a mail.</p>
                                        <p class="small m-0 opacity-50">3 Mins Ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <div class="p-3 bg-primary rounded-circle me-3">
                                        KY
                                    </div>
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Kyle Yomaha</h6>
                                        <p class="mb-1">Need support.</p>
                                        <p class="small m-0 opacity-50">5 Mins Ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <div class="p-3 bg-success rounded-circle me-3">
                                        SB
                                    </div>
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Srinu Basava</h6>
                                        <p class="mb-1">Purchased a NotePad.</p>
                                        <p class="small m-0 opacity-50">7 Mins Ago</p>
                                    </div>
                                </div>
                            </a>
                            <div class="d-grid p-3 border-top">
                                <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown d-sm-flex d-none">
                        <a class="dropdown-toggle d-flex p-3 position-relative" href="#!" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-twitch fs-4 lh-1"></i>
                            <span class="count rounded-circle bg-danger">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                            <h5 class="fw-semibold px-3 py-2 m-0">Notifications</h5>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <img src="{{asset('assets/images/user.png')}}" class="img-3x me-3 rounded-3" alt="Admin Themes" />
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                        <p class="mb-1">Membership has been ended.</p>
                                        <p class="small m-0 opacity-50">Today, 07:30pm</p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <img src="{{asset('assets/images/user2.png')}}" class="img-3x me-3 rounded-3" alt="Admin Theme" />
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                        <p class="mb-1">Congratulate, James for new job.</p>
                                        <p class="small m-0 opacity-50">Today, 08:00pm</p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item">
                                <div class="d-flex align-items-start py-2">
                                    <img src="{{asset('assets/images/user1.png')}}" class="img-3x me-3 rounded-3" alt="Admin Theme" />
                                    <div class="m-0">
                                        <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                                        <p class="mb-1">
                                            Lewis added new schedule release.
                                        </p>
                                        <p class="small m-0 opacity-50">Today, 09:30pm</p>
                                    </div>
                                </div>
                            </a>
                            <div class="d-grid p-3 border-top">
                                <a href="javascript:void(0)" class="btn btn-outline-primary">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ms-2">
                        <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-block">Violeta Escobar</span>
                            <img src="{{asset('assets/images/user.png')}}" class="img-3x m-2 me-0 rounded-5" alt="Bootstrap Gallery" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3" style="">
                            <a class="dropdown-item d-flex align-items-center py-2" href="agent-profile.html"><i
                                    class="icon-smile fs-4 me-3"></i>User Profile</a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="account-settings.html"><i
                                    class="icon-settings fs-4 me-3"></i>Account
                                Settings</a>
                            <button class="dropdown-item d-flex align-items-center py-2" onclick="Admin.Logout('{{route('adminLogout')}}', '{{route('loginAdmin')}}')"><i
                                    class="icon-log-out fs-4 me-3"></i>Logout</button>
                        </div>
                    </div>

                    <form method="POST" id="logoutForm">
                        @csrf
                    </form>
                    <!-- Toggle Menu starts -->
                    <button class="btn btn-success btn-sm ms-3 d-lg-none d-md-block" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#MobileMenu">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Toggle Menu ends -->

                </div>
                <!-- App header actions end -->

            </div>
        </div>
        <!-- Row ends -->

    </div>
    <!-- Container ends -->

</div>
<!-- App header ends -->

<!-- App navbar starts -->
<nav class="navbar navbar-expand-lg p-0">
    <div class="container">
        <div class="offcanvas offcanvas-end" id="MobileMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title semibold">Navigation</h5>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="offcanvas">
                    <i class="icon-clear"></i>
                </button>
            </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
             
                <li class="nav-item {{$active === 'dashboard' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('adminDashboard')}}"> Dashboard </a>
                </li>
                <li class="nav-item {{$active === 'terminal' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('adminTerminal')}}"> Booked Tickets </a>
                </li>
                <li class="nav-item {{$active === 'terminal' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('adminTerminal')}}"> Terminal List </a>
                </li>
                <li class="nav-item {{$active === 'bus' ? 'active-link' : ''}}" >
                    <a class="nav-link" href="{{route('adminBus')}}"> Bus List </a>
                </li>
                <li class="nav-item {{$active === 'routes' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('adminRoute')}}"> Routes </a>
                </li>
                <li class="nav-item {{$active === 'customers' ? 'active-link' : ''}}">
                    <a class="nav-link" href="clients.html"> Feedbacks </a>
                </li>
             
            </ul>
        </div>
    </div>
</nav>
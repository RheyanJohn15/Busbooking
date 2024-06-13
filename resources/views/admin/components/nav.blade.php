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

                @php
                    $user = App\Models\Admin::where('admin_id', session('admin_id'))->first();
                @endphp 
                
                    <div class="dropdown ms-2">
                        <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-block">{{$user->admin_name}}</span>
                            <img src="{{$user->admin_pic === 'none' ? asset('admin/placeholder.jfif') : asset('admin/'. $user->admin_pic)}}" class="img-3x m-2 me-0 rounded-5" alt="Bootstrap Gallery" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3" style="">
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{route('userAccount')}}"><i
                                    class="icon-smile fs-4 me-3"></i>User Profile</a>
                          
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
                <li class="nav-item {{$active === 'booked' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('adminBooked')}}"> Booked Tickets </a>
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
                <li class="nav-item {{$active === 'feedback' ? 'active-link' : ''}}">
                    <a class="nav-link" href="{{route('feedback')}}"> Feedbacks </a>
                </li>
             
            </ul>
        </div>
    </div>
</nav>
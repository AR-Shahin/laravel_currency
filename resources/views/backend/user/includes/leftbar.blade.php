<div id="left-sidebar" class="sidebar">
            <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
            <div class="navbar-brand">
                <a href="index.html"><img src="{{ asset('backend') }}/assets/images/icon.svg" alt="Mooli Logo" class="img-fluid logo"><span>Mooli</span></a>
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <div class="user_div">
                        <img src="{{ asset('backend') }}/assets/images/user.png" class="user-photo" alt="User Profile Picture">
                    </div>
                </div>
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu animation-li-delay">
                        <li class="header">Main</li>
                        <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        @can('isUser')
                            <li><a href=""><i class="fa fa-dollar"></i> <span>User</span></a></li>
                        @else
                            <li><a href=""><i class="fa fa-dollar"></i> <span>Merchant</span></a></li>
                        @endcan
                        <li><a href="{{ route('user.money-request') }}"><i class="fa fa-dollar"></i> <span>Money Request</span></a></li>
                        <li><a href="{{ route('user.receive-money-request') }}"><i class="fa fa-dollar"></i> <span>Receive Request</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="/assets/img/lamon_logo.png" alt="" height="65">
            </span>
            <span class="topnav-logo-sm">
                <img src="/assets/img/lamon_logo.png" alt="" height="65">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0 navbar-nav ms-auto bg-dark">
            
            <li class="dropdown notification-list bg-dark">
                <a class="nav-link dropdown-toggle nav-user bg-dark arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="account-user-avatar"> 
                        <img src="/assets/img/user.jpg" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name"><?= session()->get('first_name') != null ? session()->get('first_name').' '.session()->get('last_name') : 'Anonymous';?></span>
                        <span class="account-position"><?= session()->get('role_name')?></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>
                    <!-- item-->
                    <a href="/signout" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
<!-- end Topbar -->
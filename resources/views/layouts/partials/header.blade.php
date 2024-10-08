<!--  BEGIN NAVBAR  -->
<header class="desktop-nav header navbar fixed-top">
    <div class="nav-logo mr-sm-1 ml-sm-4">
        <a href="javascript:void(0);" class="nav-link sidebarCollapse d-inline-block mr-sm-5" data-placement="bottom">
            <i class="flaticon-menu-line-3"></i>
        </a>
    </div>
    <div class="nav-logo mr-sm-5 ml-sm-1">        
        <a href="index.html" class=""> 
            <img src="{{ asset('Equation3/ltr/assets/img/1.png') }}" class="img-fluid" alt="logo">
        </a>
    </div>
    <ul class="navbar-nav flex-row mr-auto">
        <li class="nav-item ml-4 d-lg-none d-sm-block d-none">
            <form class="form-inline search-full form-inline search animated-search" role="search">
                <i class="flaticon-search-1 d-lg-none d-block"></i>
                <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
            </form>
        </li>
        <li class="nav-item d-lg-block d-none">
            <form class="form-inline form-inline search animated-search" role="search">
                <i class="flaticon-search-1 d-lg-none d-block"></i>
                <input type="text" class="form-control search-form-control" placeholder="Search here...">
            </form>
        </li>
    </ul>

    <ul class="navbar-nav flex-row ml-lg-auto">
        <li class="nav-item dropdown message-dropdown ml-lg-4 mr-lg-4 d-sm-block d-none align-self-center">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="message-dropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="icon flaticon-mail-25"></span><span class="badge badge-primary">13</span>
            </a>
            <div class="dropdown-menu  position-absolute p-0 eq-animated eq-fadeInUp"
                aria-labelledby="message-dropdown">
                <div class="">
                    <a class="dropdown-item">
                        <div class="">
                            <div class="media notification-new">
                                <div class="usr-img align-self-center mr-3">
                                    <img class="usr-img rounded-circle"
                                        src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="profile">
                                </div>
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="meta-user-name mr-3 mb-0">Kara Young</p>
                                        <p class="meta-time align-self-center mb-0">04.02.19</p>
                                    </div>
                                    <p class="message-text mb-0 ">Simple and clean! Nice I'd like to </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="">
                            <div class="media notification-new">
                                <div class="notification-icon align-self-center mr-3">
                                    <i class="flaticon-mailbox"></i>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="meta-title mr-3 mb-0">1 new email</p>
                                        <p class="meta-time align-self-center mb-0">04.02.19</p>
                                    </div>
                                    <p class="message-text mb-0 ">Anderson.Daisy@mail.com</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="">
                            <div class="media">
                                <div class="usr-img align-self-center mr-3">
                                    <img class="usr-img rounded-circle"
                                        src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="profile">
                                </div>
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="meta-user-name mr-3 mb-0">Oscar Garner</p>
                                        <p class="meta-time align-self-center mb-0">04.02.19</p>
                                    </div>
                                    <p class="message-text mb-0 ">Simple and clean! Nice I'd like to </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown notification-dropdown ml-3 mr-lg-4 align-self-center">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notification-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon flaticon-bell-4"></span><span class="badge badge-success">15</span>
            </a>
            <div class="dropdown-menu position-absolute eq-animated eq-fadeInUp"
                aria-labelledby="notification-dropdown">
                <div class="notification-scroll">
                    <div class="dropdown-item">
                        <a href="">
                            <div class="media">
                                <div class="user-profile">
                                    <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile"
                                        class="img-fluid">
                                </div>
                                <div class="media-body">
                                    <span>Alan Green</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="">
                            <div class="media">
                                <div class="user-profile">
                                    <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile"
                                        class="img-fluid">
                                </div>
                                <div class="media-body">
                                    <span>Irene Collins</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="">
                            <div class="media">
                                <div class="user-profile">
                                    <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile"
                                        class="img-fluid">
                                </div>
                                <div class="media-body">
                                    <span>Sonia Shaw</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="">
                            <div class="media">
                                <div class="user-profile">
                                    <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile"
                                        class="img-fluid">
                                </div>
                                <div class="media-body">
                                    <span>Xavier</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown user-profile-dropdown pl-4 pr-lg-0 pr-2 ml-lg-2 mr-lg-4  align-self-center">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user">
                <div class="user-profile d-lg-block d-none">
                    <img src="{{ asset('Equation3/ltr/assets/img/90x90.jpg') }}" alt="admin-profile" class="img-fluid">
                </div>
                <i class="flaticon-user-7 d-lg-none d-block"></i>
            </a>
        </li>
    </ul>
</header>
<!--  END NAVBAR  -->
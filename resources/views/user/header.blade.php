<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop" style="top: -10px;">
            <nav class="limiter-menu-desktop p-l-200 p-r-200">
                <!-- Logo desktop -->
                <a href="" class="logo">
                    <img src="/template/admin/img/admin/logo2.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        @if(Auth::check())
                        <li class="active-menu">
                            <a  href="/user/home">HỆ THỐNG QUẢN LÝ CHUNG CƯ SUNHOUSE</a>
                        </li>
                        @else
                        <li class="active-menu">
                            <a href="/user/homepage">TRANG CHỦ</a>

                        </li>

                        <li class="active-menu">
                            <a href="/user/about">VỀ CHÚNG TÔI</a>
                        </li>

                        <li class="active-menu">
                            <a href="/user/contact">LIÊN HỆ</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Icon header -->

                <div class="wrap-icon-header flex-w flex-r-m main-menu">
                    <i class="zmdi zmdi-search icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-25"></i>
                    <i class="fa-solid fa-bell icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-25 bor5" style="font-size: 20px;"></i>
                    <div class="flex-c-m h-full p-l-18 p-r-25 ">
                        <div class="icons row d-inline-flex right ">
                            @if(Auth::check())
                            @foreach($residents as $key => $resident)
                            @if($resident->id == auth('web')->user()->id)
                            <i class="zmdi zmdi-account icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-toggle="dropdown"></i>

                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="#">{{$resident->name}}</a>
                                @endif
                                @endforeach

                                <a class="dropdown-item" href="/user/logout">Đăng xuất</a>
                                @else
                                <a class="dropdown-item" href="/user/login" style="font-weight: bold;">Đăng nhập</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="logo">
                <img src="/template/admin/img/admin/logo2.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">

            </a>
        </div>


        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m  m-r-15">



        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <ul class="main-menu">
                @if(Auth::check() != null)
                <li class="active-menu">
                    <a style="color:white" href="">HỆ THỐNG QUẢN LÝ</a>
                </li>
                @else
                <li class="active-menu">
                    <a style="color:white" href="/user/homepage">TRANG CHỦ</a>
                </li>

                <li class="active-menu">
                    <a style="color:white" href="/user/about">VỀ CHÚNG TÔI</a>
                </li>

                <li class="active-menu">
                    <a style="color:white" href="/user/contact">LIÊN HỆ</a>
                </li>
                @endif

                @if(Auth::check())
                <li class="active-menu">
                    @foreach($residents as $key => $resident)
                    @if($resident->id == auth('web')->user()->id)
                    <a class="dropdown-item" href="#">{{$resident->name}}</a>
                    @endif
                    @endforeach
                    <a href="/logout">ĐĂNG XUẤT</a>
                </li>

                @else
                <li class="active-menu">
                    <a href="/userlogin" style="font-weight: bold;color:white">ĐĂNG NHẬP</a>
                </li>
                @endif

            </ul>
        </ul>
    </div>
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-02 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-01 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="/search" method="POST">
                @csrf
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="ltext-102" style="color: gray; font-size: 20px" type="text" name="keywords" placeholder="Tìm kiếm...">
            </form>
        </div>
    </div>
</header>
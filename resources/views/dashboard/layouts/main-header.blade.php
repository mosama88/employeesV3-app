@php
    use Carbon\Carbon;
    Carbon::setLocale('ar');
@endphp

<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('dashboard/assets/img/brand/logo.png') }}" class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('dashboard/assets/img/brand/logo-white.png') }}" class="dark-logo-1"
                        alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('dashboard/assets/img/brand/favicon.png') }}" class="logo-2"
                        alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('dashboard/assets/img/brand/favicon.png') }}" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search"> <button
                    class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="dropdown nav-item main-header-message ">
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                            </div>
                        </div>
                        <div class="main-message-list chat-scroll">

                        </div>
                    </div>
                </div>
                @can('الاشعارات')
                    @if (Auth::user()->hasRole('super-admin') or Auth::user()->hasRole('staff'))


                        {{-- Notification --}}
                        <div class="dropdown nav-item main-header-notification">
                            <a class="new nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bell">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg><span class=" pulse"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-right">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">الاشعارات
                                        </h6>
                                        <span class="badge badge-pill badge-warning mr-auto my-auto float-left">تعيين
                                            قراءه</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">لديك
                                        {{ Auth::user()->unreadNotifications->count() }} غير مقروءة</p>
                                </div>
                                <div class="main-notification-list Notification-scroll">
                                    @if (auth()->user()->unreadNotifications->isEmpty())
                                        <div class="p-3 text-center">لا توجد أشعارات</div>
                                    @else
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <a class="d-flex p-3 border-bottom"
                                                href="{{ url('vacations/Detalis') }}/{{ $notification->data['id'] }}">
                                                <div class="notifyimg">
                                                    <i class="fas fa-envelope" style="color: #0162e8;"></i>
                                                </div>
                                                <div class="mr-3">
                                                    <h5 class="notification-label mb-1">{{ $notification->data['title'] }}
                                                        {{ $notification->data['user'] }}
                                                    </h5>
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="dropdown-footer">
                                    <a href="">عرض الكل</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endcan


                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ asset('dashboard') }}/assets/img/login-user.png"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ asset('dashboard') }}/assets/img/login-user.png" class="">
                                </div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <span>المستخدم</span>

                                </div>
                            </div>
                        </div>
                        {{-- Profile --}}
                        <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                class="far fa-user"></i>صفحتى</a>
                        {{-- Lock Screen --}}
                        <a class="dropdown-item" href="{{ route('dashboard.lock-screen') }}"><i
                                class="fas fa-lock"></i> قفل الشاشه</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i>
                            تسجيل خروج </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->

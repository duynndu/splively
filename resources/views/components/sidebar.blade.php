<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset("assets/admin/assets/images/logo-sm.png")}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset("assets/admin/assets/images/logo-dark.png")}}" alt="" height="17">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset("assets/admin/assets/images/logo-sm.png")}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset("assets/admin/assets/images/logo-light.png")}}" alt="" height="17">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Home</span></li>
                <li class="nav-item">
                    <x-nav-link wire:navigate href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse">
                        <i class="ri-apps-2-line"></i> <span>Quản lý</span>
                    </a>
                    <div class="menu-dropdown collapse show" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <x-nav-link wire:navigate href="{{route('rooms')}}" :active="request()->routeIs('rooms')">
                                    <i class="ri-tv-fill"></i><span>Cinema Room</span>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link wire:navigate href="{{route('genres')}}" :active="request()->routeIs('genres')">
                                    <i class="ri-tv-fill"></i><span>Genres</span>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link wire:navigate href="{{route('films')}}" :active="request()->routeIs('films')">
                                    <i class="bx bx-film"></i><span>Films</span>
                                </x-nav-link>
                            </li>
                            <li class="nav-item">
                                <x-nav-link wire:navigate href="{{route('screenings')}}" :active="request()->routeIs('screenings')">
                                    <i class="bx bx-film"></i><span>Screenings</span>
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

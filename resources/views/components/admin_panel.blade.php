<div class="panel-menu h-100">
    <div id="layout-menu" class="layout-menu rounded p-2 w-100 bg-dark">

        <div class="app-brand p-3">
            <a href="{{ url('/') }}" class="d-flex justify-content-center">
                <img src="{{ asset($store->where('data_name','logo')->value('picture')) }}" class="img-fluid m-auto rounded" width="120" alt="">
            </a>
        </div>

        <ul class="py-1">

            <li class="menu-header  text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>

            <!-- Dashboard -->
            <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ url('home') }}" class="nav-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    Dashboard
                </a>
            </li>



            <li class="menu-header text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
                <a href="javascript:void(0);" class="nav-link menu-toggle">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-layer-group"></i>
                        Layouts
                    </div>
                    <i class="fa-solid arrow fa-caret-right"></i>
                </a>

                <ul class="menu-sub hide">
                    <li class="menu-item {{ Request::is('menu') ? 'active' : '' }}">
                        <a href="{{ route('menu.index') }}" class="nav-link">
                            <i class="fa-solid me-2 fa-list-ul"></i>  Menu
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('slider') ? 'active' : '' }}">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="fa-solid me-2 fa-images"></i>Home Sliders
                        </a>
                    </li>

                    {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="layouts-container.html" class="nav-link">
                  account
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Fluid
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Blank
                </a>
              </li> --}}

                </ul>
            </li>

            <li class="menu-header text-uppercase">
                <span class="menu-header-text">Users Settings</span>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="nav-link menu-toggle">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-users-gear"></i>
                        User Settings
                    </div>
                    <i class="fa-solid arrow fa-caret-right"></i>
                </a>

                <ul class="menu-sub hide">
                    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-solid me-2 fa-user-shield"></i>  Users
                        </a>
                    </li>

                    {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Notifications
                </a>
              </li> --}}

                    {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="pages-account-settings-connections.html" class="nav-link">
                  Connections
                </a>
              </li> --}}

                </ul>
            </li>


            {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
            <a href="javascript:void(0);" class="nav-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              Authentications
                <i class="fa-solid arrow fa-caret-right"></i>

            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Login
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Register
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="nav-link">
                  Forgot Password
                </a>
              </li>
            </ul>
          </li> --}}

            <li class="menu-header text-uppercase">
                <span class="menu-header-text">settings</span>
            </li>

            <li class="menu-item">
                <div class="d-flex gap-2">

                </div>
                <a href="javascript:void(0);" class="nav-link menu-toggle">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-sliders"></i>
                        Settings
                    </div>

                    <i class="fa-solid arrow fa-caret-right"></i>

                </a>
                <ul class="menu-sub hide">
                    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-solid me-2 fa-wrench"></i> theme settings
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
                        <a href="" class="nav-link">
                            <i class="fa-solid me-2 fa-screwdriver-wrench"></i> Under Maintenance
                        </a>
                    </li>
                </ul>
            </li>




        </ul>
    </div>
    <!-- / Menu -->


</div>

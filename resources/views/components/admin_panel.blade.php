<div class="panel-menu h-100">
    <div id="layout-menu" class="layout-menu rounded p-2 menu-vertical w-100 bg-dark menu bg-menu-theme">

        <div class="app-brand p-3">
          <a href="{{ url('/') }}" class="app-brand-link m-auto">
            <img src="" class="img-fluid" height="50" alt="">
            <span class="text-center nav-link">logo name</span>
          </a>
        </div>

        <ul class="menu-inner py-1">

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
              </li>
          <!-- Dashboard -->
          <li class="menu-item {{ Request::is('home')? 'active': '' }}">
            <a href="{{ url('home') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div >Dashboard</div>
            </a>
          </li>



          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
          </li>

          <!-- Layouts -->
          <li class="menu-item {{ Request::is(['home','slider'])? 'active': '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div>Layouts</div>
            </a>

            <ul class="menu-sub rounded-2">
              <li class="menu-item {{ Request::is('menu')? 'active': '' }}">
                <a href="{{ route('menu.index') }}" class="menu-link">
                  <div>Menu</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('slider')? 'active': '' }}">
                <a href="{{ route('slider.index') }}" class="menu-link">
                  <div>Sliders</div>
                </a>
              </li>

              {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="layouts-container.html" class="menu-link">
                  <div>account</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Fluid</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Blank</div>
                </a>
              </li> --}}

            </ul>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Users Settings</span>
          </li>
          <li class="menu-item {{ Request::is('home')? 'active': '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div >User Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div >Users</div>
                </a>
              </li>

              {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Notifications</div>
                </a>
              </li> --}}

              {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="pages-account-settings-connections.html" class="menu-link">
                  <div>Connections</div>
                </a>
              </li> --}}

            </ul>
          </li>


          {{-- <li class="menu-item {{ Request::is('home')? 'active': '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div >Authentications</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div >Login</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Register</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Forgot Password</div>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">settings</span>
          </li>

          <li class="menu-item {{ Request::is('home')? 'active': '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div>Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>theme settings</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('home')? 'active': '' }}">
                <a href="" class="menu-link">
                  <div>Under Maintenance</div>
                </a>
              </li>
            </ul>
          </li>




        </ul>
      </div>
      <!-- / Menu -->


</div>

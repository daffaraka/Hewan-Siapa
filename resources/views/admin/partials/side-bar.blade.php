<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/index.html" title="Sleek Dashboard">
        <svg
          class="brand-icon"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid"
          width="30"
          height="33"
          viewBox="0 0 30 33">
          <g fill="none" fill-rule="evenodd">
            <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
          </g>
        </svg>

        <span class="brand-name text-truncate">Sleek Dashboard</span>
      </a>
    </div>

    <!-- begin sidebar scrollbar -->
    <div class="" data-simplebar>
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">

        <li class="has-sub active expand">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
            aria-expanded="false" aria-controls="dashboard">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text font-size-15">Dashboard</span> <b class="caret"></b>
          </a>

          <ul class="collapse " id="dashboard" data-parent="#sidebar-menu">
            <div class="sub-menu">

              <li class="{{set_active_views('hewan-siapa.index')}}" >
                <a class="sidenav-item-link" href="{{route('hewan-siapa.index')}}" >
                  <span class="nav-text">Homepage situs</span>
                </a>
              </li>

              <li class="{{set_active_views('dashboard.admin')}}" >
                <a class="sidenav-item-link" href="{{route('dashboard.admin')}}" >
                  <span class="nav-text">Dashboard admin</span>
                </a>
              </li>

              <li class=" {{set_active_views('jenishewan.index')}}" >
                <a class="sidenav-item-link" href="{{route('jenishewan.index')}}" >
                  <span class="nav-text">Tabel Jenis Hewan</span>
                </a>
              </li>

              <li class=" {{set_active_views('rashewan.index')}}"  >
                <a class="sidenav-item-link" href="{{route('rashewan.index')}}">
                  <span class="nav-text">Tabel Ras Hewan</span>
                </a>
              </li>

            </div>
          </ul>
        </li>

        <li class="has-sub active expand">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
            aria-expanded="false" aria-controls="icons">
            <i class="mdi mdi-diamond-stone"></i>
            <span class="nav-text font-size-15">Post</span> <b class="caret"></b>
          </a>

          <ul class="collapse" id="icons" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="{{set_active_views('adopsi.index')}}">
                <a class="sidenav-item-link" href="{{route('adopsi.index')}}">
                  <span class="nav-text">Adopsi</span>
                </a>
              </li>

              <li class="{{set_active_views('pemacakan.index')}}">
                <a class="sidenav-item-link" href="{{route('pemacakan.index')}}">
                  <span class="nav-text">Pemacakan</span>
                </a>
              </li>

              <li class="{{set_active_views('laporan.laporan')}}">
                <a class="sidenav-item-link" href="{{route('laporan.adopsi')}}">
                  <span class="nav-text">Laporan Adopsi</span>
                </a>
              </li>
              <li class="{{set_active_views('laporan.laporan')}}">
                <a class="sidenav-item-link" href="{{route('laporan.pemacakan')}}">
                  <span class="nav-text">Laporan Pemacakan</span>
                </a>
              </li>
            </div>
          </ul>
        </li>

        <li class="has-sub active expand">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
            aria-expanded="false" aria-controls="forms">
            <i class="mdi mdi-email-mark-as-unread"></i>
            <span class="nav-text font-size-15">User</span> <b class="caret"></b>
          </a>

          <ul class="collapse " id="forms" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="{{set_active_views('user.index')}}">
                <a class="sidenav-item-link" href="{{route('user.index')}}">
                  <span class="nav-text">User Management</span>
                </a>
              </li>

              <li class="{{set_active_views('roles.index')}}">
                <a class="sidenav-item-link" href="{{route('roles.index')}}">
                  <span class="nav-text">Role Management</span>
                </a>
              </li>

              {{-- <li class="">
                <a class="sidenav-item-link" href="flag-icon.html">
                  <span class="nav-text">Laporan Transaksi</span>
                </a>
              </li> --}}
            </div>
          </ul>
        </li>






        <li class="has-sub active expand">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components"
            aria-expanded="false" aria-controls="components">
            <i class="mdi mdi-folder-multiple-outline"></i>
            <span class="nav-text">Components</span> <b class="caret"></b>
          </a>

          <ul class="collapse " id="components" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="">
                <a class="sidenav-item-link" href="alert.html">
                  <span class="nav-text">Alert</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="badge.html">
                  <span class="nav-text">Badge</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="breadcrumb.html">
                  <span class="nav-text">Breadcrumb</span>

                </a>
              </li>

              <li class="has-sub ">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#buttons"
                  aria-expanded="false" aria-controls="buttons">
                  <span class="nav-text">Buttons</span> <b class="caret"></b>
                </a>

                <ul class="collapse " id="buttons">
                  <div class="sub-menu">
                    <li class="">
                      <a href="button-default.html">Button Default</a>
                    </li>

                   <li class="">
                      <a href="button-dropdown.html">Button Dropdown</a>
                    </li>

                   <li class="">
                      <a href="button-group.html">Button Group</a>
                    </li>

                   <li class="">
                      <a href="button-social.html">Button Social</a>
                    </li>

                   <li class="">
                      <a href="button-loading.html">Button Loading</a>
                    </li>
                  </div>
                </ul>
              </li>
              
              <li class="">
                <a class="sidenav-item-link" href="card.html">
                  <span class="nav-text">Card</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="carousel.html">
                  <span class="nav-text">Carousel</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="collapse.html">
                  <span class="nav-text">Collapse</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="list-group.html">
                  <span class="nav-text">List Group</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="modal.html">
                  <span class="nav-text">Modal</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="pagination.html">
                  <span class="nav-text">Pagination</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="popover-tooltip.html">
                  <span class="nav-text">Popover & Tooltip</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="progress-bar.html">
                  <span class="nav-text">Progress Bar</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="spinner.html">
                  <span class="nav-text">Spinner</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="switcher.html">
                  <span class="nav-text">Switcher</span>
                </a>
              </li>

              <li class="">
                <a class="sidenav-item-link" href="tab.html">
                  <span class="nav-text">Tab</span>
                </a>
              </li>
            </div>
          </ul>
        </li>

   


      

        <!-- <li class="section-title">
          Documentation
        </li> -->
      </ul>
    </div>

 
</aside>
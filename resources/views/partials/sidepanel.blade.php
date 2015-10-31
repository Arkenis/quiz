    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">

      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header" style="padding:0;">
        <img src="{!! asset('pages/assets/img/logo_white.svg') !!}" alt="logo" class="brand" data-src="{!! asset('pages/assets/img/logo_white.svg') !!}" data-src-retina="{!! asset('pages/assets/img/logo_white.svg') !!}" height="12" style="padding-left:20px;">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar">
            <i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->

      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-5 ">
            <a href="{{ route('quizzes') }}">
              <span class="title">Synaglar</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-th"></i></span>
          </li>
          <li class="m-t-5 ">
            <a href="{{ URL::route('users.index') }}">
              <span class="title">Ulanyjylar</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
          </li>
          <li class="m-t-5 ">
            <a href="{{ url('auth/logout') }}">
              <span class="title">Çıkış</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-sign-out"></i></span>
          </li>

        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->

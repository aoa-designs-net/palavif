<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Title -->
  <title> @yield('title') | PAF-NATION</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/vendor.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/icon-set/style.css')}}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/theme.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/palavif.css')}}">
  @stack('css')
</head>

<body class="bg-palavif" data-offset="80" data-hs-scrollspy-options='{
          "target": "#navbarSettings"
        }'>
  <!-- Search Form -->
  <div id="searchDropdown" class="hs-unfold-content dropdown-unfold search-fullwidth d-md-none">
    <form class="input-group input-group-merge input-group-borderless">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="tio-search"></i>
        </div>
      </div>

      <input class="form-control rounded-0" type="search" placeholder="Search on this page" aria-label="Search on this page">

      <div class="input-group-append">
        <div class="input-group-text">
          <div class="hs-unfold">
            <a class="js-hs-unfold-invoker" href="javascript:;" data-hs-unfold-options='{
                 "target": "#searchDropdown",
                 "type": "css-animation",
                 "animationIn": "fadeIn",
                 "hasOverlay": "rgba(46, 52, 81, 0.1)",
                 "closeBreakpoint": "md"
               }'>
              <i class="tio-clear tio-lg"></i>
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- End Search Form -->

  <!-- ========== HEADER ========== -->
  <div id="headerMain">
    <header id="header" class="navbar navbar-expand-xl navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered navbar-palavif-dark">
      <div class="js-mega-menu navbar-nav-wrap hs-menu-initialized hs-menu-horizontal">

        <div class="navbar-brand-wrapper">
          <!-- Logo -->
          <a class="navbar-brand" href="{{route('dashboard.index')}}" aria-label="PAFNATION   ">
            <img class="navbar-brand-logo" src="{{asset('backend/assets/svg/logos/logo.svg')}}" alt="Logo">
          </a>
          <!-- End Logo -->
        </div>

        <!-- Secondary Content -->
        <div class="navbar-nav-wrap-content-right">
          <!-- Navbar -->
          <ul class="navbar-nav align-items-center flex-row">
            <li class="nav-item ">
              <!-- Notification -->
              <div class="hs-unfold">
                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-light rounded-circle" href="javascript:;" data-hs-unfold-options="{
                 &quot;target&quot;: &quot;#notificationDropdown&quot;,
                 &quot;type&quot;: &quot;css-animation&quot;
               }" data-hs-unfold-target="#notificationDropdown" data-hs-unfold-invoker="">
                  <i class="tio-notifications-on-outlined"></i>
                  <span class="btn-status btn-sm-status btn-status-danger"></span>
                </a>

                <div id="notificationDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated" style="width: 25rem; animation-duration: 300ms;" data-hs-target-height="518.378" data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp" data-hs-unfold-content-animation-out="fadeOut">
                  <!-- Header -->
                  <div class="card-header">
                    <span class="card-title h4">Notifications</span>

                    <!-- Unfold -->
                    <div class="hs-unfold">
                      <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-light rounded-circle" href="javascript:;" data-hs-unfold-options="{
                       &quot;target&quot;: &quot;#notificationSettingsOneDropdown&quot;,
                       &quot;type&quot;: &quot;css-animation&quot;
                     }" data-hs-unfold-target="#notificationSettingsOneDropdown" data-hs-unfold-invoker="">
                        <i class="tio-more-vertical"></i>
                      </a>
                      <div id="notificationSettingsOneDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated" data-hs-target-height="0" data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp" data-hs-unfold-content-animation-out="fadeOut" style="animation-duration: 300ms;">
                        <span class="dropdown-header">Settings</span>
                        <a class="dropdown-item" href="#">
                          <i class="tio-archive dropdown-item-icon"></i> Archive all
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="tio-all-done dropdown-item-icon"></i> Mark all as read
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="tio-toggle-off dropdown-item-icon"></i> Disable notifications
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="tio-gift dropdown-item-icon"></i> What's new?
                        </a>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-header">Feedback</span>
                        <a class="dropdown-item" href="#">
                          <i class="tio-chat-outlined dropdown-item-icon"></i> Report
                        </a>
                      </div>
                    </div>
                    <!-- End Unfold -->
                  </div>
                  <!-- End Header -->

                  <!-- Nav -->
                  <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="notificationNavOne-tab" data-toggle="tab" href="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="notificationNavTwo-tab" data-toggle="tab" href="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                    </li>
                  </ul>
                  <!-- End Nav -->

                  <!-- Body -->
                  <div class="card-body-height">
                    <!-- Tab Content -->
                    <div class="tab-content" id="notificationTabContent">
                      <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                        <ul class="list-group list-group-flush navbar-card-list-group">

                          <!-- Item -->
                          <li class="list-group-item custom-checkbox-list-wrapper">
                            <div class="row">
                              <div class="col-auto position-static">
                                <div class="d-flex align-items-center">
                                  <div class="custom-control custom-checkbox custom-checkbox-list">
                                    <input type="checkbox" class="custom-control-input" id="notificationCheck4" checked="">
                                    <label class="custom-control-label" for="notificationCheck4"></label>
                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                  </div>
                                  <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img10.jpg')}}" alt="Image Description">
                                  </div>
                                </div>
                              </div>
                              <div class="col ml-n3">
                                <span class="card-title h5">Ruby Walter</span>
                                <p class="card-text font-size-sm">joined the Slack group HS Team</p>
                              </div>
                              <small class="col-auto text-muted text-cap">3dy</small>
                            </div>
                            <a class="stretched-link" href="#"></a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li class="list-group-item custom-checkbox-list-wrapper">
                            <div class="row">
                              <div class="col-auto position-static">
                                <div class="d-flex align-items-center">
                                  <div class="custom-control custom-checkbox custom-checkbox-list">
                                    <input type="checkbox" class="custom-control-input" id="notificationCheck3">
                                    <label class="custom-control-label" for="notificationCheck3"></label>
                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                  </div>
                                  <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{asset('backend/assets/svg/brands/google.svg')}}" alt="Image Description">
                                  </div>
                                </div>
                              </div>
                              <div class="col ml-n3">
                                <span class="card-title h5">from Google</span>
                                <p class="card-text font-size-sm">Start using forms to capture the information of prospects visiting your Google website</p>
                              </div>
                              <small class="col-auto text-muted text-cap">17dy</small>
                            </div>
                            <a class="stretched-link" href="#"></a>
                          </li>
                          <!-- End Item -->
                        </ul>
                      </div>

                      <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                        <ul class="list-group list-group-flush navbar-card-list-group">
                          <!-- Item -->
                          <li class="list-group-item custom-checkbox-list-wrapper">
                            <div class="row">
                              <div class="col-auto position-static">
                                <div class="d-flex align-items-center">
                                  <div class="custom-control custom-checkbox custom-checkbox-list">
                                    <input type="checkbox" class="custom-control-input" id="notificationCheck7">
                                    <label class="custom-control-label" for="notificationCheck7"></label>
                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                  </div>
                                  <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                    <span class="avatar-initials">A</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col ml-n3">
                                <span class="card-title h5">Anne Richard</span>
                                <p class="card-text font-size-sm">accepted your invitation to join Notion</p>
                              </div>
                              <small class="col-auto text-muted text-cap">1dy</small>
                            </div>
                            <a class="stretched-link" href="#"></a>
                          </li>
                          <!-- End Item -->

                          <!-- Item -->
                          <li class="list-group-item custom-checkbox-list-wrapper">
                            <div class="row">
                              <div class="col-auto position-static">
                                <div class="d-flex align-items-center">
                                  <div class="custom-control custom-checkbox custom-checkbox-list">
                                    <input type="checkbox" class="custom-control-input" id="notificationCheck6">
                                    <label class="custom-control-label" for="notificationCheck6"></label>
                                    <span class="custom-checkbox-list-stretched-bg"></span>
                                  </div>
                                  <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img5.jpg')}}" alt="Image Description">
                                  </div>
                                </div>
                              </div>
                              <div class="col ml-n3">
                                <span class="card-title h5">Finch Hoot</span>
                                <p class="card-text font-size-sm">left Slack group HS projects</p>
                              </div>
                              <small class="col-auto text-muted text-cap">3dy</small>
                            </div>
                            <a class="stretched-link" href="#"></a>
                          </li>
                          <!-- End Item -->

                      </div>
                    </div>
                    <!-- End Tab Content -->
                  </div>
                  <!-- End Body -->

                  <!-- Card Footer -->
                  <a class="card-footer text-center" href="#">
                    View all notifications
                    <i class="tio-chevron-right"></i>
                  </a>
                  <!-- End Card Footer -->
                </div>
              </div>
              <!-- End Notification -->
            </li>

            <li class="nav-item ">
              <!-- Apps -->
              <div class="hs-unfold">
                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-light rounded-circle" href="javascript:;" data-hs-unfold-options="{
                 &quot;target&quot;: &quot;#appsDropdown&quot;,
                 &quot;type&quot;: &quot;css-animation&quot;
               }" data-hs-unfold-target="#appsDropdown" data-hs-unfold-invoker="">
                  <i class="tio-menu-vs-outlined"></i>
                </a>

                <div id="appsDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated" style="width: 25rem; animation-duration: 300ms;" data-hs-target-height="449.801" data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp" data-hs-unfold-content-animation-out="fadeOut">
                  <!-- Header -->
                  <div class="card-header">
                    <span class="card-title h4">Web apps &amp; services</span>
                  </div>
                  <!-- End Header -->

                  <!-- Body -->
                  <div class="card-body card-body-height">
                    <!-- Nav -->
                    <div class="nav nav-pills flex-column">
                      <a class="nav-link" href="#">
                        <div class="media align-items-center">
                          <span class="mr-3">
                            <img class="avatar avatar-xs avatar-4by3" src="{{asset('backend/assets/svg/brands/atlassian.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="h5 mb-0">Atlassian</span>
                            <span class="d-block font-size-sm text-body">Security and control across Cloud</span>
                          </div>
                        </div>
                      </a>

                      <a class="nav-link" href="#">
                        <div class="media align-items-center">
                          <span class="mr-3">
                            <img class="avatar avatar-xs avatar-4by3" src="{{asset('backend/assets/svg/brands/slack.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="h5 mb-0">Slack <span class="badge badge-primary badge-pill text-uppercase ml-1">Try</span></span>
                            <span class="d-block font-size-sm text-body">Email collaboration software</span>
                          </div>
                        </div>
                      </a>

                      <a class="nav-link" href="#">
                        <div class="media align-items-center">
                          <span class="mr-3">
                            <img class="avatar avatar-xs avatar-4by3" src="{{asset('backend/assets/svg/brands/google-webdev.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="h5 mb-0">Google webdev</span>
                            <span class="d-block font-size-sm text-body">Work involved in developing a website</span>
                          </div>
                        </div>
                      </a>

                      <a class="nav-link" href="#">
                        <div class="media align-items-center">
                          <span class="mr-3">
                            <img class="avatar avatar-xs avatar-4by3" src="{{asset('backend/assets/svg/brands/frontapp.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="h5 mb-0">Frontapp</span>
                            <span class="d-block font-size-sm text-body">The inbox for teams</span>
                          </div>
                        </div>
                      </a>

                      <a class="nav-link" href="#">
                        <div class="media align-items-center">
                          <span class="mr-3">
                            <img class="avatar avatar-xs avatar-4by3" src="{{asset('backend/assets/svg/illustrations/review-rating-shield.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="h5 mb-0">HS Support</span>
                            <span class="d-block font-size-sm text-body">Customer service and support</span>
                          </div>
                        </div>
                      </a>

                    </div>
                    <!-- End Nav -->
                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <a class="card-footer text-center" href="#">
                    View all apps
                    <i class="tio-chevron-right"></i>
                  </a>
                  <!-- End Footer -->
                </div>
              </div>
              <!-- End Apps -->
            </li>

            {{-- <li class="nav-item ">
              <!-- Activity -->
              <div class="hs-unfold">
                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-light rounded-circle" href="javascript:;" data-hs-unfold-options="{
                &quot;target&quot;: &quot;#activitySidebar&quot;,
                &quot;type&quot;: &quot;css-animation&quot;,
                &quot;animationIn&quot;: &quot;fadeInRight&quot;,
                &quot;animationOut&quot;: &quot;fadeOutRight&quot;,
                &quot;hasOverlay&quot;: true,
                &quot;smartPositionOff&quot;: true
               }" data-hs-unfold-target="#activitySidebar" data-hs-unfold-invoker="">
                  <i class="tio-voice-line"></i>
                </a>
              </div>
              <!-- Activity -->
            </li> --}}

            <li class="nav-item">
              <!-- Account -->
              <div class="hs-unfold">
                <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;" data-hs-unfold-options="{
                 &quot;target&quot;: &quot;#accountNavbarDropdown&quot;,
                 &quot;type&quot;: &quot;css-animation&quot;
               }" data-hs-unfold-target="#accountNavbarDropdown" data-hs-unfold-invoker="">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img6.jpg')}}" alt="Image Description">
                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                  </div>
                </a>

                <div id="accountNavbarDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated" style="width: 16rem; animation-duration: 300ms;" data-hs-target-height="399.431" data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp" data-hs-unfold-content-animation-out="fadeOut">
                  <div class="dropdown-item-text">
                    <div class="media align-items-center">
                      <div class="avatar avatar-sm avatar-circle mr-2">
                        <img class="avatar-img" src="{{asset('backend/assets/img/160x160/img6.jpg')}}" alt="Image Description">
                      </div>
                      <div class="media-body">
                        <span class="card-title h5">Mark Williams</span>
                        <span class="card-text">mark@example.com</span>
                      </div>
                    </div>
                  </div>

                  <div class="dropdown-divider"></div>

                  <!-- Unfold -->
                  <div class="hs-unfold w-100">
                    <a class="js-hs-unfold-invoker navbar-dropdown-submenu-item dropdown-item d-flex align-items-center" href="javascript:;" data-hs-unfold-options="{
                     &quot;target&quot;: &quot;#navSubmenuPagesAccountDropdown1&quot;,
                     &quot;event&quot;: &quot;hover&quot;
                   }" data-hs-unfold-target="#navSubmenuPagesAccountDropdown1" data-hs-unfold-invoker="">
                      <span class="text-truncate pr-2" title="Set status">Set status</span>
                      <i class="tio-chevron-right navbar-dropdown-submenu-item-invoker ml-auto"></i>
                    </a>

                    <div id="navSubmenuPagesAccountDropdown1" class="hs-unfold-content hs-unfold-has-submenu dropdown-unfold dropdown-menu navbar-dropdown-sub-menu hs-unfold-hidden hs-unfold-content-initialized hs-unfold-simple" data-hs-target-height="0" data-hs-unfold-content="">
                      <a class="dropdown-item" href="#">
                        <span class="legend-indicator bg-success mr-1"></span>
                        <span class="text-truncate pr-2" title="Available">Available</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <span class="legend-indicator bg-danger mr-1"></span>
                        <span class="text-truncate pr-2" title="Busy">Busy</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <span class="legend-indicator bg-warning mr-1"></span>
                        <span class="text-truncate pr-2" title="Away">Away</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">
                        <span class="text-truncate pr-2" title="Reset status">Reset status</span>
                      </a>
                    </div>
                  </div>
                  <!-- End Unfold -->

                  <a class="dropdown-item" href="#">
                    <span class="text-truncate pr-2" title="Profile &amp; account">Profile &amp; account</span>
                  </a>

                  <a class="dropdown-item" href="#">
                    <span class="text-truncate pr-2" title="Settings">Settings</span>
                  </a>

                  <div class="dropdown-divider"></div>



                  <a class="dropdown-item" href="#">
                    <span class="text-truncate pr-2" title="Manage team">Manage team</span>
                  </a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </div>
              <!-- End Account -->
            </li>

            <!-- Home Button Toggler -->
            <li class="nav-item">
              <!-- Toggle -->
              <button type="button" class="navbar-toggler btn btn-ghost-light rounded-circle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarNavMenu" data-toggle="collapse" data-target="#navbarNavMenu">
                <i class="tio-menu-hamburger"></i>
              </button>
              <!-- End Toggle -->
            </li>
            <!-- End Home Button Toggler -->
          </ul>
          <!-- End Navbar -->
        </div>
        <!-- End Secondary Content -->

        <!-- Home and Search Navbar -->
        <div class="navbar-nav-wrap-content-left collapse navbar-collapse" id="navbarNavMenu">
          <div class="navbar-body mr-5">
            <ul class="navbar-nav flex-grow-1">
              <!-- Home -->
              <li>
                <a class="navbar-nav-link nav-link text-white" href="{{route('dashboard.index')}}">
                  <i class="tio-home-vs-1-outlined nav-icon"></i> Home
                </a>
              </li>
              <!-- End Home -->
            </ul>

          </div>
          <!-- Search Form -->
          <div class="d-none d-lg-block">
            <form class="position-relative">
              <!-- Input Group -->
              <div class="input-group input-group-merge navbar-input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="tio-search"></i>
                  </div>
                </div>
                <input type="search" class="js-form-search form-control" placeholder="Search on this page" aria-label="Search on this page" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                <a class="input-group-append" href="javascript:;">
                  <span class="input-group-text">
                    <i id="clearSearchResultsIcon" class="tio-clear" style="display: none;"></i>
                  </span>
                </a>
              </div>
              <!-- End Input Group -->

              <!-- Card Search Content -->
              <div id="searchDropdownMenu" class="hs-form-search-menu-content card dropdown-menu dropdown-card overflow-hidden">
                <!-- Body -->
                <div class="card-body-height py-3">
                  <small class="dropdown-header mb-n2">Recent searches</small>

                  <div class="dropdown-item bg-transparent text-wrap my-2">
                    <span class="h4 mr-1">
                      <a class="btn btn-xs btn-soft-dark btn-pill" href="{{route('dashboard.index')}}">
                        Gulp <i class="tio-search ml-1"></i>
                      </a>
                    </span>
                    <span class="h4">
                      <a class="btn btn-xs btn-soft-dark btn-pill" href="{{route('dashboard.index')}}">
                        Notification panel <i class="tio-search ml-1"></i>
                      </a>
                    </span>
                  </div>

                  <div class="dropdown-divider my-3"></div>

                  <small class="dropdown-header mb-n2">Tutorials</small>

                  <a class="dropdown-item my-2" href="{{route('dashboard.index')}}">
                    <div class="media align-items-center">
                      <span class="icon icon-xs icon-soft-dark icon-circle mr-2">
                        <i class="tio-tune"></i>
                      </span>

                      <div class="media-body text-truncate">
                        <span>How to set up Gulp?</span>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item my-2" href="{{route('dashboard.index')}}">
                    <div class="media align-items-center">
                      <span class="icon icon-xs icon-soft-dark icon-circle mr-2">
                        <i class="tio-paint-bucket"></i>
                      </span>

                      <div class="media-body text-truncate">
                        <span>How to change theme color?</span>
                      </div>
                    </div>
                  </a>

                  <div class="dropdown-divider my-3"></div>

                  <small class="dropdown-header mb-n2">Members</small>

                  <a class="dropdown-item my-2" href="{{route('dashboard.index')}}">
                    <div class="media align-items-center">
                      <img class="avatar avatar-xs avatar-circle mr-2" src="{{asset('backend/assets/img/160x160/img10.jpg')}}" alt="Image Description">
                      <div class="media-body text-truncate">
                        <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item my-2" href="{{route('dashboard.index')}}">
                    <div class="media align-items-center">
                      <img class="avatar avatar-xs avatar-circle mr-2" src="{{asset('backend/assets/img/160x160/img3.jpg')}}" alt="Image Description">
                      <div class="media-body text-truncate">
                        <span>David Harrison</span>
                      </div>
                    </div>
                  </a>

                  <a class="dropdown-item my-2" href="{{route('dashboard.index')}}">
                    <div class="media align-items-center">
                      <div class="avatar avatar-xs avatar-soft-info avatar-circle mr-2">
                        <span class="avatar-initials">A</span>
                      </div>
                      <div class="media-body text-truncate">
                        <span>Anne Richard</span>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <a class="card-footer text-center" href="{{route('dashboard.index')}}">
                  See all results
                  <i class="tio-chevron-right"></i>
                </a>
                <!-- End Footer -->
              </div>
              <!-- End Card Search Content -->
            </form>
          </div>
          <!-- End Search Form -->
        </div>
        <!-- End Home and Search Navbar -->
      </div>
    </header>
  </div>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <!-- BG PALAVIF Content -->
    <div class="bg-palavif-dark">
      @yield('head_card')
    </div>
    <!-- End BG PALAVIF  Content -->

    <!-- Content -->
    @yield('content')
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->

  <!-- Activity -->
  <div id="activitySidebar" class="hs-unfold-content sidebar sidebar-bordered sidebar-box-shadow">
    <div class="card card-lg sidebar-card">
      <div class="card-header">
        <h4 class="card-header-title">Activity stream</h4>

        <!-- Toggle Button -->
        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-dark ml-2" href="javascript:;" data-hs-unfold-options='{
            "target": "#activitySidebar",
            "type": "css-animation",
            "animationIn": "fadeInRight",
            "animationOut": "fadeOutRight",
            "hasOverlay": true,
            "smartPositionOff": true
           }'>
          <i class="tio-clear tio-lg"></i>
        </a>
        <!-- End Toggle Button -->
      </div>

      <!-- Body -->
      <div class="card-body sidebar-body sidebar-scrollbar">
        <!-- Step -->
        <ul class="step step-icon-sm step-avatar-sm">
          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <div class="step-avatar">
                <img class="step-avatar-img" src="{{asset('backend/assets/img/160x160/img9.jpg')}}" alt="Image Description">
              </div>

              <div class="step-content">
                <h5 class="mb-1">Iana Robinson</h5>

                <p class="font-size-sm mb-1">Added 2 files to task <a class="text-uppercase" href="#"><i class="tio-folder-bookmarked"></i> Fd-7</a></p>

                <ul class="list-group list-group-sm">
                  <!-- List Item -->
                  <li class="list-group-item list-group-item-light">
                    <div class="row gx-1">
                      <div class="col-6">
                        <div class="media">
                          <span class="mt-1 mr-2">
                            <img class="avatar avatar-xs" src="{{asset('backend/assets/svg/brands/excel.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="d-block font-size-sm text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                            <small class="d-block text-muted">12kb</small>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="media">
                          <span class="mt-1 mr-2">
                            <img class="avatar avatar-xs" src="{{asset('backend/assets/svg/brands/word.svg')}}" alt="Image Description">
                          </span>
                          <div class="media-body text-truncate">
                            <span class="d-block font-size-sm text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                            <small class="d-block text-muted">4kb</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- End List Item -->
                </ul>

                <small class="text-muted text-uppercase">Now</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <span class="step-icon step-icon-soft-dark">B</span>

              <div class="step-content">
                <h5 class="mb-1">Bob Dean</h5>

                <p class="font-size-sm mb-1">Marked <a class="text-uppercase" href="#"><i class="tio-folder-bookmarked"></i> Fr-6</a> as <span class="badge badge-soft-success badge-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>

                <small class="text-muted text-uppercase">Today</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <div class="step-avatar">
                <img class="step-avatar-img" src="{{asset('backend/assets/img/160x160/img3.jpg')}}" alt="Image Description">
              </div>

              <div class="step-content">
                <h5 class="h5 mb-1">Crane</h5>

                <p class="font-size-sm mb-1">Added 5 card to <a href="#">Payments</a></p>

                <ul class="list-group list-group-sm">
                  <li class="list-group-item list-group-item-light">
                    <div class="row gx-1">
                      <div class="col">
                        <img class="img-fluid rounded ie-sidebar-activity-img" src="{{asset('backend/assets/svg/illustrations/card-1.svg')}}" alt="Image Description">
                      </div>
                      <div class="col">
                        <img class="img-fluid rounded ie-sidebar-activity-img" src="{{asset('backend/assets/svg/illustrations/card-2.svg')}}" alt="Image Description">
                      </div>
                      <div class="col">
                        <img class="img-fluid rounded ie-sidebar-activity-img" src="{{asset('backend/assets/svg/illustrations/card-3.svg')}}" alt="Image Description">
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="text-center">
                          <a href="#">+2</a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>

                <small class="text-muted text-uppercase">May 12</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <span class="step-icon step-icon-soft-info">D</span>

              <div class="step-content">
                <h5 class="mb-1">David Lidell</h5>

                <p class="font-size-sm mb-1">Added a new member to Front Dashboard</p>

                <small class="text-muted text-uppercase">May 15</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <div class="step-avatar">
                <img class="step-avatar-img" src="{{asset('backend/assets/img/160x160/img7.jpg')}}" alt="Image Description">
              </div>

              <div class="step-content">
                <h5 class="mb-1">Rachel King</h5>

                <p class="font-size-sm mb-1">Marked <a class="text-uppercase" href="#"><i class="tio-folder-bookmarked"></i> Fr-3</a> as <span class="badge badge-soft-success badge-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>

                <small class="text-muted text-uppercase">Apr 29</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <div class="step-avatar">
                <img class="step-avatar-img" src="{{asset('backend/assets/img/160x160/img5.jpg')}}" alt="Image Description">
              </div>

              <div class="step-content">
                <h5 class="mb-1">Finch Hoot</h5>

                <p class="font-size-sm mb-1">Earned a "Top endorsed" <i class="tio-verified text-primary"></i> badge</p>

                <small class="text-muted text-uppercase">Apr 06</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->

          <!-- Step Item -->
          <li class="step-item">
            <div class="step-content-wrapper">
              <span class="step-icon step-icon-soft-primary">
                <i class="tio-user"></i>
              </span>

              <div class="step-content">
                <h5 class="mb-1">Project status updated</h5>

                <p class="font-size-sm mb-1">Marked <a class="text-uppercase" href="#"><i class="tio-folder-bookmarked"></i> Fr-3</a> as <span class="badge badge-soft-primary badge-pill"><span class="legend-indicator bg-primary"></span>"In progress"</span></p>

                <small class="text-muted text-uppercase">Feb 10</small>
              </div>
            </div>
          </li>
          <!-- End Step Item -->
        </ul>
        <!-- End Step -->

        <a class="btn btn-block btn-white" href="javascript:;">View all <i class="tio-chevron-right"></i></a>
      </div>
      <!-- End Body -->
    </div>
  </div>
  <!-- End Activity -->

  <!-- ========== END SECONDARY CONTENTS ========== -->

  @include('alerts.toast.launcher')
  <!-- JS Implementing Plugins -->
  <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

  <!-- JS Front -->
  <script src="{{asset('backend/assets/js/theme.min.js')}}"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function() {
      // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
      // =======================================================
      // var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

      // INITIALIZATION OF UNFOLD
      // =======================================================
      $('.js-hs-unfold-invoker').each(function() {
        var unfold = new HSUnfold($(this)).init();
      });

      // INITIALIZATION OF FORM SEARCH
      // =======================================================
      $('.js-form-search').each(function() {
        new HSFormSearch($(this)).init()
      });

      // INITIALIZATION OF CLIPBOARD
      // =======================================================
      $('.js-clipboard').each(function() {
        var clipboard = $.HSCore.components.HSClipboard.init(this);
      });

      // INITIALIZATION OF STICKY BLOCKS
      // =======================================================
      $('.js-sticky-block').each(function() {
        var stickyBlock = new HSStickyBlock($(this), {
          targetSelector: $('#header').hasClass('navbar-fixed') ? '#header' : null
        }).init();
      });

      

      // INITIALIZATION OF SCROLL NAV
      // =======================================================
      var scrollspy = new HSScrollspy($('body'), {
        // !SETTING "resolve" PARAMETER AND RETURNING "resolve('completed')" IS REQUIRED
        beforeScroll: function(resolve) {
          if (window.innerWidth < 992) {
            $('#navbarVerticalNavMenu').collapse('hide').on('hidden.bs.collapse', function() {
              return resolve('completed');
            });
          } else {
            return resolve('completed');
          }
        }
      }).init();

      $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });


    });
  </script>
  @stack('js')
</body>

</html>
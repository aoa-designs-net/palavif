<div id="headerMain">
    <header id="header"
        class="navbar navbar-expand-xl navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered navbar-palavif-dark">
        <div class="js-mega-menu navbar-nav-wrap hs-menu-initialized hs-menu-horizontal">

            <div class="navbar-brand-wrapper">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard.index') }}" aria-label="PAFNATION">
                    <img class="navbar-brand-logo" src="{{ asset('backend/assets/svg/logos/logo.svg') }}" alt="Logo">
                </a>
                <!-- End Logo -->
            </div>

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item">
                        <a class="navbar-nav-link nav-link" href="{{ route('dashboard.wallet.index') }}">
                            <span class="badge badge-warning badge-pill ml-1">
                                <i class="tio-warning mr-1"></i> Go Pro
                            </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <!-- Notification -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-light rounded-circle"
                                href="javascript:;" data-hs-unfold-options="{
                 &quot;target&quot;: &quot;#notificationDropdown&quot;,
                 &quot;type&quot;: &quot;css-animation&quot;
               }" data-hs-unfold-target="#notificationDropdown" data-hs-unfold-invoker="">
                                <i class="tio-notifications-on-outlined"></i>
                                <span class="btn-status btn-sm-status btn-status-danger"></span>
                            </a>

                            <div id="notificationDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated"
                                style="width: 25rem; animation-duration: 300ms;" data-hs-target-height="518.378"
                                data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp"
                                data-hs-unfold-content-animation-out="fadeOut">
                                <!-- Header -->
                                <div class="card-header">
                                    <span class="card-title h4">Notifications</span>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body-height">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="notificationTabContent">
                                        <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel"
                                            aria-labelledby="notificationNavOne-tab">
                                            <ul class="list-group list-group-flush navbar-card-list-group">

                                                <!-- Item -->
                                                <li class="list-group-item custom-checkbox-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-auto position-static">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="notificationCheck4" checked="">
                                                                    <label class="custom-control-label"
                                                                        for="notificationCheck4"></label>
                                                                    <span
                                                                        class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('backend/assets/img/160x160/img10.jpg') }}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">Ruby Walter</span>
                                                            <p class="card-text font-size-sm">joined the Slack group HS
                                                                Team</p>
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
                                                                <div
                                                                    class="custom-control custom-checkbox custom-checkbox-list">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="notificationCheck3">
                                                                    <label class="custom-control-label"
                                                                        for="notificationCheck3"></label>
                                                                    <span
                                                                        class="custom-checkbox-list-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{ asset('backend/assets/svg/brands/google.svg') }}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col ml-n3">
                                                            <span class="card-title h5">from Google</span>
                                                            <p class="card-text font-size-sm">Start using forms to
                                                                capture the information of prospects visiting your
                                                                Google website</p>
                                                        </div>
                                                        <small class="col-auto text-muted text-cap">17dy</small>
                                                    </div>
                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->
                                            </ul>
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
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-light rounded-circle"
                                href="javascript:;"
                                data-hs-unfold-options="{&quot;target&quot;: &quot;#appsDropdown&quot;,&quot;type&quot;: &quot;css-animation&quot;}"
                                data-hs-unfold-target="#appsDropdown" data-hs-unfold-invoker="">
                                <i class="tio-menu-vs-outlined"></i>
                            </a>

                            <div id="appsDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated"
                                style="width: 25rem; animation-duration: 300ms;" data-hs-target-height="449.801"
                                data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp"
                                data-hs-unfold-content-animation-out="fadeOut">
                                <!-- Header -->
                                <div class="card-header">
                                    <span class="card-title h4"> Quick Tools </span>
                                </div>
                                <!-- End Header -->

                                <!-- Body -->
                                <div class="card-body card-body-height">
                                    <!-- Nav -->
                                    <div class="nav nav-pills flex-column">
                                        <a class="nav-link" href="#">
                                            <div class="media align-items-center">
                                                <span class="mr-3">
                                                    <img class="avatar avatar-xs avatar-4by3"
                                                        src="{{ asset('backend/assets/svg/brands/atlassian.svg') }}"
                                                        alt="Image Description">
                                                </span>
                                                <div class="media-body text-truncate">
                                                    <span class="h5 mb-0">Atlassian</span>
                                                    <span class="d-block font-size-sm text-body">Security and control
                                                        across Cloud</span>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="nav-link" href="#">
                                            <div class="media align-items-center">
                                                <span class="mr-3">
                                                    <img class="avatar avatar-xs avatar-4by3"
                                                        src="{{ asset('backend/assets/svg/brands/slack.svg') }}"
                                                        alt="Image Description">
                                                </span>
                                                <div class="media-body text-truncate">
                                                    <span class="h5 mb-0">Slack <span
                                                            class="badge badge-primary badge-pill text-uppercase ml-1">Try</span></span>
                                                    <span class="d-block font-size-sm text-body">Email collaboration
                                                        software</span>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="nav-link" href="#">
                                            <div class="media align-items-center">
                                                <span class="mr-3">
                                                    <img class="avatar avatar-xs avatar-4by3"
                                                        src="{{ asset('backend/assets/svg/brands/google-webdev.svg') }}"
                                                        alt="Image Description">
                                                </span>
                                                <div class="media-body text-truncate">
                                                    <span class="h5 mb-0">Google webdev</span>
                                                    <span class="d-block font-size-sm text-body">Work involved in
                                                        developing a website</span>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="nav-link" href="#">
                                            <div class="media align-items-center">
                                                <span class="mr-3">
                                                    <img class="avatar avatar-xs avatar-4by3"
                                                        src="{{ asset('backend/assets/svg/brands/frontapp.svg') }}"
                                                        alt="Image Description">
                                                </span>
                                                <div class="media-body text-truncate">
                                                    <span class="h5 mb-0">Frontapp</span>
                                                    <span class="d-block font-size-sm text-body">The inbox for
                                                        teams</span>
                                                </div>
                                            </div>
                                        </a>

                                        <a class="nav-link" href="#">
                                            <div class="media align-items-center">
                                                <span class="mr-3">
                                                    <img class="avatar avatar-xs avatar-4by3"
                                                        src="{{ asset('backend/assets/svg/illustrations/review-rating-shield.svg') }}"
                                                        alt="Image Description">
                                                </span>
                                                <div class="media-body text-truncate">
                                                    <span class="h5 mb-0">HS Support</span>
                                                    <span class="d-block font-size-sm text-body">Customer service and
                                                        support</span>
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


                    <li class="nav-item">
                        <!-- Account -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                                data-hs-unfold-options="{
                 &quot;target&quot;: &quot;#accountNavbarDropdown&quot;,
                 &quot;type&quot;: &quot;css-animation&quot;
               }" data-hs-unfold-target="#accountNavbarDropdown" data-hs-unfold-invoker="">
                                <div class="avatar avatar-sm avatar-circle">
                                    {{-- <img class="avatar-img" src="{{ auth()->user()->account->user_avatar }}"
                                        alt="Image Description"> --}}
                                    @if (auth()->user()->account->avatar)
                                        <img class="avatar-img" src="{{ auth()->user()->account->avatar }}"
                                            alt="Image Description">
                                    @else
                                        <span class="avatar-img">
                                            <span
                                                class="avatar-initials">{{ set_user_initials(auth()->user()->name) }}</span>
                                        </span>
                                    @endif
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account hs-unfold-hidden hs-unfold-content-initialized hs-unfold-css-animation animated"
                                style="width: 16rem; animation-duration: 300ms;" data-hs-target-height="399.431"
                                data-hs-unfold-content="" data-hs-unfold-content-animation-in="slideInUp"
                                data-hs-unfold-content-animation-out="fadeOut">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            @if (auth()->user()->account->avatar)
                                                <img class="avatar-img" src="{{ auth()->user()->account->avatar }}"
                                                    alt="Image Description">
                                            @else
                                                <span class="avatar-img">
                                                    <span
                                                        class="avatar-initials">{{ set_user_initials(auth()->user()->name) }}</span>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5"> {{ auth()->user()->name }} </span>
                                            <span class="card-text">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('dashboard.profile.index') }}">
                                    <span class="text-truncate pr-2" title="Profile &amp; account">Profile &amp;
                                        account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="Manage team">Manage Downline</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="text-truncate pr-2" title="Sign out">Sign out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>

                </ul>
                <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->

            <!-- Home and Search Navbar -->
            <div class="navbar-nav-wrap-content-left">
                <!-- Search Form -->
                <div class="d-none d-lg-block  ml-8">
                    <form class="position-relative">
                        <!-- Input Group -->
                        <div class="input-group input-group-merge navbar-input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="search" class="js-form-search form-control" placeholder="Search on this page"
                                aria-label="Search on this page" data-hs-form-search-options='{
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
                        <div id="searchDropdownMenu"
                            class="hs-form-search-menu-content card dropdown-menu dropdown-card overflow-hidden">
                            <!-- Body -->
                            <div class="card-body-height py-3">
                                <small class="dropdown-header mb-n2">Recent searches</small>

                                <div class="dropdown-item bg-transparent text-wrap my-2">
                                    <span class="h4 mr-1">
                                        <a class="btn btn-xs btn-soft-dark btn-pill"
                                            href="{{ route('dashboard.profile.index') }}">
                                            profile <i class="tio-search ml-1"></i>
                                        </a>
                                    </span>
                                    <span class="h4">
                                        <a class="btn btn-xs btn-soft-dark btn-pill"
                                            href="{{ route('dashboard.wallet.index') }}">
                                            wallet <i class="tio-search ml-1"></i>
                                        </a>
                                    </span>
                                </div>

                                <div class="dropdown-divider my-3"></div>

                                <small class="dropdown-header mb-n2">Tutorials</small>

                                <a class="dropdown-item my-2" href="{{ route('dashboard.index') }}">
                                    <div class="media align-items-center">
                                        <span class="icon icon-xs icon-soft-dark icon-circle mr-2">
                                            <i class="tio-tune"></i>
                                        </span>

                                        <div class="media-body text-truncate">
                                            <span>How to upgrade your account?</span>
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-divider my-3"></div>


                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <a class="card-footer text-center" href="{{ route('dashboard.index') }}">
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

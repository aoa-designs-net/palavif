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
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/icon-set/style.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/palavif.css') }}">
    @stack('css')
</head>

<body class="bg-palavif" data-offset="80" data-hs-scrollspy-options='{ "target": "#navbarSettings" }'>
    <!-- Search Form -->
    <div id="searchDropdown" class="hs-unfold-content dropdown-unfold search-fullwidth d-md-none">
        <form class="input-group input-group-merge input-group-borderless">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="tio-search"></i>
                </div>
            </div>

            <input class="form-control rounded-0" type="search" placeholder="Search on this page"
                aria-label="Search on this page">

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
    @include('includes.header')
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="main">
        <!-- BG PALAVIF Content -->
        <div class="bg-palavif-dark">
            @yield('head_card')
        </div>
        <!-- End BG PALAVIF  Content -->

        <!-- Content -->
        <div class="content container-fluid" style="margin-top: -18rem;">
            <div class="row">
               
                <!-- Left Column SideBar -->
                <div class="col-lg-3">
                    @include('includes.sidebar.left')
                </div>
                <!-- End Left Column SideBar -->

                <!-- Center Column SideBar -->
                <div class="col-lg-6">
                    @yield('content')
                </div>
                <!-- End of Center Column SideBar -->

                <!-- Right Column SideBar -->
                <div class="col-lg-3">
                    @include('includes.sidebar.right')
                </div>
                <!-- End of Right Column SideBar -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Activity -->
    @include('includes.activity')
    <!-- End Activity -->
    @include('alerts.toast.launcher')
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('backend/assets/js/theme.min.js') }}"></script>

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

            // INITIALIZATION OF SCROLL NAV
            // =======================================================
            var scrollspy = new HSScrollspy($('body'), {
                // !SETTING "resolve" PARAMETER AND RETURNING "resolve('completed')" IS REQUIRED
                beforeScroll: function(resolve) {
                    if (window.innerWidth < 992) {
                        $('#navbarVerticalNavMenu').collapse('hide').on('hidden.bs.collapse',
                            function() {
                                return resolve('completed');
                            });
                    } else {
                        return resolve('completed');
                    }
                }
            }).init();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @stack('js')
</body>

</html>

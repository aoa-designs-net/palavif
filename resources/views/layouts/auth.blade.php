<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Title -->
    <title> @yield('title') | PAF-NATION</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet"> --}}

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor.min.css')}}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/theme.css')}}">
</head>

<body class="bg-indigo">
    <!-- ========== HEADER ========== -->
    <header id="header" class="header header-bg-transparent header-abs-top">
        <div class="header-section">
            <div id="logoAndNav" class="container-fluid">
                <!-- Nav -->
                <nav class="navbar navbar-expand header-navbar">
                    <!-- White Logo -->
                    <a class="d-none d-lg-flex navbar-brand header-navbar-brand" href="index.html" aria-label="Front">
                        <img src="{{asset('frontend/assets/svg/logos/logo.svg')}}" alt="Logo">
                    </a>
                    <!-- End White Logo -->

                    <!-- Default Logo -->
                    <a class="d-flex d-lg-none navbar-brand header-navbar-brand header-navbar-brand-collapsed" href="index.html" aria-label="Front">
                        <img src="{{asset('frontend/assets/svg/logos/logo.svg')}}" alt="Logo">
                    </a>
                    <!-- End Default Logo -->

                    <!-- Button -->
                    <div class="ml-auto">
                        <a class="btn btn-sm btn-link text-body" href="/">
                            <i class="fas fa-angle-left fa-sm mr-1"></i> Go to homepage
                        </a>
                    </div>
                    <!-- End Button -->
                </nav>
                <!-- End Nav -->
            </div>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN ========== -->
    <main id="content" role="main">
        <!-- Form -->
        <div class="d-flex align-items-center position-relative vh-lg-100">
            <div class="col-lg-5 col-xl-4 d-none d-lg-flex align-items-center bg-light vh-lg-100 px-0">
                <div class="w-100 p-5 ">
                    <blockquote class="blockquote text-secondary" style=" border-left: 0">
                        <p class="h3 mb-0 text-secondary">"Someone's sitting in the shade today because someone planted a tree a long time ago."</p>
                        <footer class="blockquote-footer text-primary text-right"> <strong> Warren Buffet </strong></footer>
                    </blockquote>

                    <!-- Testimonials Carousel Pagination -->
                    <div id="testimonialsNavPagination" class="js-slick-carousel slick slick-transform-off slick-pagination-modern mx-auto" data-hs-slick-carousel-options='{
                 "infinite": true,
                 "slidesToShow": 3,
                 "centerMode": true,
                 "isThumbs": true,
                 "asNavFor": "#testimonialsNavMain"
               }'>
                        <div class="js-slide">
                            <div class="avatar avatar-circle mx-auto">
                                <img class="avatar-img" src="assets/img/100x100/img1.jpg" alt="Image Description">
                            </div>
                        </div>

                    </div>
                    <!-- End Testimonials Carousel Pagination -->

                </div>
            </div>

            <div class="container">
                <div class="row no-gutters">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- End Form -->
    </main>
    <!-- ========== END MAIN ========== -->


    <!-- JS Implementing Plugins -->
    <script src="{{asset('frontend/assets/js/vendor.min.js')}}"></script>

    <!-- JS Front -->
    <script src="{{asset('frontend/assets/js/theme.min.js')}}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF SLICK CAROUSEL
            // =======================================================
            $('.js-slick-carousel').each(function() {
                var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
            });
        });

    </script>

    @stack('js')

</body>

</html>

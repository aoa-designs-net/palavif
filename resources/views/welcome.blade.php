<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <!-- Title -->
    <title>@yield('title') | PafNation </title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor.min.css')}}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/theme.css')}}">
</head>
<body>
    <!-- ========== HEADER ========== -->
    <header id="header" class="header header-box-shadow-on-scroll header-bg-transparent header-abs-top header-show-hide" data-hs-header-options='{
              "fixMoment": 1000,
              "fixEffect": "slide"
            }'>
        <div class="header-section">
            <div id="logoAndNav" class="container">
                <!-- Nav -->
                <nav class="js-mega-menu navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index.html" aria-label="Front">
                        <img src="{{asset('frontend/assets/svg/logos/logo.svg')}}" alt="Logo">
                    </a>
                    <!-- End Logo -->

                    <!-- Responsive Toggle Button -->
                    <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                        <span class="navbar-toggler-default">
                            <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
                            </svg>
                        </span>
                        <span class="navbar-toggler-toggled">
                            <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                            </svg>
                        </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <!-- Navigation -->
                    <div id="navBar" class="collapse navbar-collapse">
                        <div class="navbar-body header-abs-top-inner">
                            <ul class="navbar-nav">
                                <!-- Button -->
                                <li class="navbar-nav-last-item">
                                    <a class="pagesMegaMenu" href="{{ route('login.social-media') }}" target="_blank">LOGIN</a>
                                </li>
                                <!-- End Button -->
                                 <!-- Button -->
                                 <li class="navbar-nav-last-item">
                                    <a class="pagesMegaMenu" href="{{ route('register.social-media') }}" target="_blank">REGISTER</a>
                                </li>
                                <!-- End Button -->
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation -->
                </nav>
                <!-- End Nav -->
            </div>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="overflow-hidden">
        <!-- Hero Section -->
        <div class="position-relative bg-img-hero" style="background-image: url(assets/svg/components/abstract-shapes-12.svg);">
            <div class="container space-top-3 space-bottom-lg-3">
                <div class="row justify-content-lg-between align-items-lg-center pt-lg-5">
                    <div class="col-lg-5">
                        <!-- Info -->
                        <div class="mb-5">
                            <h1 class="display-4 mb-3">The ad that manages itself</h1>
                            <p class="lead">Automate all your ad management strategies for Facebook, Google and Snapchat Ads in a single interface.</p>
                        </div>
                        <!-- End Info -->

                        <!-- Form -->
                        <form class="js-validate mb-7">
                            <div class="form-row">
                                <div class="col-sm col-md-6 col-lg mb-2">
                                    <div class="js-form-message">
                                        <label class="sr-only" for="signupSrEmail">Your email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Your email" aria-label="Your email" required data-msg="Please enter a valid email address.">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Request Demo</button>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->

                        <span class="d-block small font-weight-bold text-cap mb-2">Front partners:</span>

                        <!-- Clients -->
                        <div class="row">
                            <div class="col-4 col-sm-3 my-2">
                                <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{asset('frontend/assets/svg/clients-logo/airbnb.svg')}}" alt="Image Description">
                            </div>
                            <div class="col-4 col-sm-3 my-2">
                                <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{asset('frontend/assets/svg/clients-logo/fitbit.svg')}}" alt="Image Description">
                            </div>
                            <div class="col-4 col-sm-3 my-2">
                                <img class="max-w-11rem max-w-md-13rem mx-auto" src="{{asset('frontend/assets/svg/clients-logo/weebly.svg')}}" alt="Image Description">
                            </div>
                        </div>
                        <!-- End Clients -->
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="col-lg-6 position-lg-absolute bottom-0 right-0 transform-rotate-5 mr-lg-n11">
                <div class="row align-items-end mx-n2">
                    <div class="col px-2 mb-5">
                        <div class="mb-3" data-aos="fade-up">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x472/img2.jpg')}}" alt="Image Description">
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x472/img3.jpg')}}" alt="Image Description">
                        </div>
                    </div>

                    <div class="col px-2">
                        <div class="mb-3" data-aos="fade-up" data-aos-delay="200">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x520/img1.jpg')}}" alt="Image Description">
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-delay="300">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x407/img1.jpg')}}" alt="Image Description">
                        </div>
                    </div>

                    <div class="col px-2 mb-7">
                        <div class="mb-3" data-aos="fade-up" data-aos-delay="400">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x472/img6.jpg')}}" alt="Image Description">
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-delay="500" data-aos-offset="-50">
                            <img class="img-fluid shadow-lg rounded" src="{{asset('frontend/assets/img/407x115/img1.jpg')}}" alt="Image Description">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Gallery -->
        </div>
        <!-- End Hero Section -->

        <!-- Icon Blocks Section -->
        <div class="container space-2 space-lg-3">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <span class="d-block small font-weight-bold text-cap mb-2">Benefits</span>
                <h2 class="h1">What our 37,500+ clients love about Front</h2>
            </div>
            <!-- End Title -->

            <div class="row">
                <div class="col-md-4 mb-5 mb-md-0">
                    <!-- Icon Blocks -->
                    <div class="text-center px-lg-3">
                        <figure class="max-w-10rem mx-auto mb-4">
                            <img class="img-fluid" src="{{asset('frontend/assets/svg/icons/icon-45.svg')}}" alt="SVG">
                        </figure>
                        <h3>Less routine<br>– more creativity</h3>
                        <p>Automate best strategies and focus more on generating hq creatives.</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>

                <div class="col-md-4 mb-5 mb-md-0">
                    <!-- Icon Blocks -->
                    <div class="text-center px-lg-3">
                        <figure class="max-w-10rem mx-auto mb-4">
                            <img class="img-fluid" src="{{asset('frontend/assets/svg/icons/icon-29.svg')}}" alt="SVG">
                        </figure>
                        <h3>Scale<br>budgets efficiently</h3>
                        <p>Scale your budgets fast and increase ROI at the same time.</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>

                <div class="col-md-4">
                    <!-- Icon Blocks -->
                    <div class="text-center px-lg-3">
                        <figure class="max-w-10rem mx-auto mb-4">
                            <img class="img-fluid" src="{{asset('frontend/assets/svg/icons/icon-31.svg')}}" alt="SVG">
                        </figure>
                        <h3>Hundreds<br>of thousands saved</h3>
                        <p>Stop inefficient budget spend or pour more into a winning ad when needed.</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <!-- End Icon Blocks Section -->

        <!-- Testimonials Section -->
        <div class="overflow-hidden space-bottom-2">
            <div class="position-relative bg-dark text-center rounded-lg mx-3 mx-md-11">
                <div class="container space-1 space-md-2 space-lg-3 position-relative z-index-2">
                    <!-- Title -->
                    <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-7">
                        <span class="d-block small text-white-70 font-weight-bold text-cap mb-2">Case study</span>
                        <img class="max-w-15rem" src="{{asset('frontend/assets/svg/clients-logo/uber-white.svg')}}" alt="SVG Logo">
                    </div>
                    <!-- End Title -->

                    <!-- Blockquote -->
                    <div class="w-md-75 mx-md-auto mb-6">
                        <blockquote class="h3 text-white font-weight-normal text-lh-lg">"I am absolutely floored by the level of care and attention to detail the team at Htmlstream have put into this theme and for one can guarantee that I will be a return customer. I've had my eye on this for quite some time but I've only recently be able to get hands on, with it."</blockquote>
                    </div>
                    <!-- End Blockquote -->

                    <!-- Reviewer -->
                    <div class="w-lg-50 mx-lg-auto">
                        <div class="avatar avatar-circle mb-3">
                            <img class="avatar-img" src="{{asset('frontend/assets/img/100x100/img10.jpg')}}" alt="Image Description">
                        </div>
                        <h4 class="text-white mb-0">Luisa</h4>
                        <span class="d-block text-white-70">Head of IT department</span>
                    </div>
                    <!-- End Reviewer -->

                    <!-- SVG Quote -->
                    <figure class="position-absolute bottom-0 right-0 left-0 z-index-n1 mb-11">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25rem" height="25rem" viewBox="0 0 8 8" style="enable-background:new 0 0 8 8;" xml:space="preserve">
                            <path fill="#fff" opacity=".025" d="M3,1.3C2,1.7,1.2,2.7,1.2,3.6c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5
                C1.4,6.9,1,6.6,0.7,6.1C0.4,5.6,0.3,4.9,0.3,4.5c0-1.6,0.8-2.9,2.5-3.7L3,1.3z M7.1,1.3c-1,0.4-1.8,1.4-1.8,2.3
                c0,0.2,0,0.4,0.1,0.5c0.2-0.2,0.5-0.3,0.9-0.3c0.8,0,1.5,0.6,1.5,1.5c0,0.9-0.7,1.5-1.5,1.5c-0.7,0-1.1-0.3-1.4-0.8
                C4.4,5.6,4.4,4.9,4.4,4.5c0-1.6,0.8-2.9,2.5-3.7L7.1,1.3z" />
                        </svg>
                    </figure>
                    <!-- End SVG Quote -->

                    <!-- SVG Shapes -->
                    <figure class="position-absolute top-0 left-0 mt-10 ml-10">
                        <img src="{{asset('frontend/assets/svg/components/abstract-shapes-11.svg')}}" alt="SVG">
                    </figure>
                    <!-- <figure class="max-w-15rem w-100 position-absolute bottom-0 right-0">
                        <div class="mb-n7 mr-n7">
                            <img class="img-fluid" src="{{asset('frontend/assets/svg/components/dots-4.svg')}}" alt="Image Description">
                        </div>
                    </figure> -->
                    <!-- End SVG Shapes -->
                </div>
            </div>
        </div>
        <!-- End Testimonials Section -->

        <!-- Articles Section -->
        <div class="container space-2">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <span class="d-block small font-weight-bold text-cap mb-2">Platforms</span>
                <h2 class="h1">Three platforms – handled by one tool</h2>
            </div>
            <!-- End Title -->

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-md-5 mb-lg-0">
                    <!-- Card -->
                    <a class="card shadow-soft h-100 text-center transition-3d-hover" href="#">
                        <div class="card-body pt-7 px-7">
                            <figure class="avatar mx-auto mb-4">
                                <img class="avatar-img" src="{{asset('frontend/assets/img/160x160/img20.png')}}" alt="Logo">
                            </figure>
                            <h3>Facebook Ads</h3>
                            <p class="text-body">Automated rules, Auto Post Boosting, Bulk Creation and reports in Slack.</p>
                        </div>
                        <div class="card-footer border-0 pt-0 pb-7 px-7">
                            <span class="font-weight-bold">Learn More <i class="fas fa-angle-right fa-sm ml-1"></i></span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-lg-4 mb-4 mb-md-5 mb-lg-0">
                    <!-- Card -->
                    <a class="card shadow-soft h-100 text-center transition-3d-hover" href="#">
                        <div class="card-body pt-7 px-7">
                            <figure class="avatar mx-auto mb-4">
                                <img class="avatar-img" src="{{asset('frontend/assets/img/160x160/img35.png')}}" alt="Logo">
                            </figure>
                            <h3>Google Ads</h3>
                            <p class="text-body">The best scripts alternative and quick reports for the whole team.</p>
                        </div>
                        <div class="card-footer border-0 pt-0 pb-7 px-7">
                            <span class="font-weight-bold">Learn More <i class="fas fa-angle-right fa-sm ml-1"></i></span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>

                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <a class="card shadow-soft h-100 text-center transition-3d-hover" href="#">
                        <div class="card-body pt-7 px-7">
                            <figure class="avatar mx-auto mb-4">
                                <img class="avatar-img" src="{{asset('frontend/assets/img/160x160/img36.png')}}" alt="Logo">
                            </figure>
                            <h3>Snapchat Ads</h3>
                            <p class="text-body">Scale profitable snaps and optimize your cost per swipe by using automated rules.</p>
                        </div>
                        <div class="card-footer border-0 pt-0 pb-7 px-7">
                            <span class="font-weight-bold">Learn More <i class="fas fa-angle-right fa-sm ml-1"></i></span>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Articles Section -->

        <!-- Stats Section -->
        <div class="container space-bottom-2 space-bottom-lg-3">
            <div class="w-lg-80 mx-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <div class="text-center">
                            <span class="d-block font-size-5 font-size-md-down-3 text-dark font-weight-bold">2M+</span>
                            <p>Actions automated monthly</p>
                        </div>
                    </div>

                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <div class="text-center">
                            <span class="d-block font-size-5 font-size-md-down-3 text-dark font-weight-bold">$55M+</span>
                            <p>Ad budgets managed monthly</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="text-center">
                            <span class="d-block font-size-5 font-size-md-down-3 text-dark font-weight-bold">37K+</span>
                            <p>Clients around the world</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats Section -->

       
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="bg-light">
        <div class="container">
            <div class="space-top-2 space-bottom-1 space-bottom-lg-2">
                <div class="row justify-content-lg-between">
                    <div class="col-lg-3 ml-lg-auto mb-5 mb-lg-0">
                        <!-- Logo -->
                        <div class="mb-4">
                            <a href="index.html" aria-label="Front">
                                <img class="brand" src="{{asset('frontend/assets/svg/logos/logo.svg')}}" alt="Logo">
                            </a>
                        </div>
                        <!-- End Logo -->

                        <!-- Nav Link -->
                        <ul class="nav nav-sm nav-x-0 flex-column">
                            <li class="nav-item">
                                <a class="nav-link media" href="#">
                                    <span class="media">
                                        <span class="fas fa-location-arrow mt-1 mr-2"></span>
                                        <span class="media-body">
                                            153 Williamson Plaza, Maggieberg
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link media" href="#">
                                    <span class="media">
                                        <span class="fas fa-phone-alt mt-1 mr-2"></span>
                                        <span class="media-body">
                                            +1 (062) 109-9222
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- End Nav Link -->
                    </div>

                    <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
                        <h5>Company</h5>

                        <!-- Nav Link -->
                        <ul class="nav nav-sm nav-x-0 flex-column">
                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Careers <span class="badge badge-primary ml-1">We're hiring</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Customers</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Hire us</a></li>
                        </ul>
                        <!-- End Nav Link -->
                    </div>

                    <div class="col-6 col-md-3 col-lg mb-5 mb-lg-0">
                        <h5>Features</h5>

                        <!-- Nav Link -->
                        <ul class="nav nav-sm nav-x-0 flex-column">
                            <li class="nav-item"><a class="nav-link" href="#">Press</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Release notes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Integrations</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                        </ul>
                        <!-- End Nav Link -->
                    </div>
                </div>
            </div>

            <hr class="my-0">

            <div class="space-1">
                <div class="row align-items-md-center mb-7">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <!-- Nav Link -->
                        <ul class="nav nav-sm nav-x-0 align-items-center">
                            <li class="nav-item">
                                <a class="{{ route('frontpage') }}" href="#">Home</a>
                            </li>
                            <li class="nav-item opacity mx-3">&#47;</li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item opacity mx-3">&#47;</li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Market Place</a>
                            </li>
                        </ul>
                        <!-- End Nav Link -->
                    </div>

                    <div class="col-md-6 text-md-right">
                        <ul class="list-inline mb-0">
                            <!-- Social Networks -->
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>
                            <!-- End Social Networks -->

                            
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="w-md-75 text-lg-center mx-lg-auto">
                    <p class="text-muted small">&copy; PafNation. 2021. All rights reserved with love.</p>
                </div>
                <!-- End Copyright -->
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->

    <!-- Go to Top -->
    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'>
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- End Go to Top -->


    <!-- JS Implementing Plugins -->
    <script src="{{asset('frontend/assets/js/vendor.min.js')}}"></script>

    <!-- JS Front -->
    <script src="{{asset('frontend/assets/js/theme.min.js')}}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF HEADER
            // =======================================================
            var header = new HSHeader($('#header')).init();


            // INITIALIZATION OF MEGA MENU
            // =======================================================
            var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
                desktop: {
                    position: 'left'
                }
            }).init();


            // INITIALIZATION OF UNFOLD
            // =======================================================
            var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


            // INITIALIZATION OF ION RANGE SLIDER
            // =======================================================
            var ionRangeSlider = $.HSCore.components.HSIonRangeSlider.init($('.js-ion-range-slider'), {
                cusOnChange: function() {
                    var $checked = $('.js-switch-text:checked')
                        , defData = JSON.parse($checked.attr('data-hs-switch-text-options'));

                    defData.target[0].text = $('#rangeSliderResult').text();
                    defData.target[1].text = $('#rangeSliderSecondaryResult').text();

                    $checked.attr('data-hs-switch-text-options', JSON.stringify(defData));
                }
            });


            // INITIALIZATION OF SWITCH
            // =======================================================
            $('.js-switch-text').each(function() {
                var switchText = new HSSwitchText($(this), {
                    afterChange: function() {
                        ionRangeSlider.data('ionRangeSlider').update({
                            from: $(this)[0].target[0].text
                        });
                    }
                }).init();
            });


            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });


            // INITIALIZATION OF AOS
            // =======================================================
            AOS.init({
                duration: 650
                , once: true
            });


            // INITIALIZATION OF GO TO
            // =======================================================
            $('.js-go-to').each(function() {
                var goTo = new HSGoTo($(this)).init();
            });
        });

    </script>

    <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');

    </script>
</body>

<!-- Mirrored from htmlstream.com/front/landing-classic-advertisement.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Mar 2021 15:27:32 GMT -->
</html>

<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transform Lives with Smart Giving </title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/assets/img/icon/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    @vite(['resources/js/app.ts'])
    @yield('styles')
</head>

<body>
    <header>
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-sm-block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="d-flex justify-content-between flex-wrap align-items-center">
                                    <div class="header-info-left">
                                        <ul>
                                            <li><i class="fas fa-phone-alt"></i> +254 71234568</li>
                                            <li><a href="" class="__cf_email__">info@charity.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="header-info-right">
                                        <ul class="header-social">
                                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">

                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/">{{ config('app.name') }}</a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">

                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="about-us">About</a></li>

                                            </li>
                                            <li><a href="contact-us">Contact</a></li>
                                            <li>
                                                <div class="header-right-btn f-right  ml-15">
                                                    <a href="login" class="header-btn">Donate Now</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>

        @yield('content')

    </main>
    <footer>
        <div class="footer-wrapper">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-20">

                                    <div class="footer-logo mb-35">
                                        <a href="/">{{ config('app.name') }}</a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>
                                                Marhab foundationCross is committed to supporting communities through
                                                food,
                                                medical aid, and essentials. Our smart donation platform uses technology
                                                to enhance donor engagement and maximize impact.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="footer-social">
                                        <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offset-xl-1 col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Services</h4>
                                    <ul>
                                        <li><a href="#">Pet Care</a></li>
                                        <li><a href="#">Pet Treatment</a></li>
                                        <li><a href="#">Pet Trainingl</a></li>
                                        <li><a href="#">Hygienic Care</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle mb-10">
                                    <h4>Subscribe newsletter</h4>
                                    <p>Subscribe our newsletter to get updates about our services and offers.</p>
                                </div>

                                <div class="footer-form mb-20">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="" method="get"
                                            class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Enter your email" class="placeholder hide-on-focus">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    <i class="fas fa-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>Copyright ©2025 All rights reserved </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <script src="{{ asset('website/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('website/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ asset('website/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/barfiller.js') }}"></script>

    <script src="{{ asset('website/assets/js/contact.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('website/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('website/assets/js/main.js') }}"></script>
    @yield('scripts')


</body>

</html>

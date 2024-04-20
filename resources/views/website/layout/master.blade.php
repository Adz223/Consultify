<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TEAM CONSULTATION</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/conult-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/full-calender/lib/main.css') }}" />


    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('./web2assets/css/conult.css') }}" />
    <link rel="stylesheet" href="{{ asset('./web2assets/css/conult-responsive.css') }}" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('./web2assets/images/loader.png') }}"
            alt="" />
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('website.layout.header')


        @yield('content')

        @include('website.layout.footer')


    </div><!-- /.page-wrapper -->




    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{ asset('./web2assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('./web2assets/vendors/timepicker/timePicker.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('./web2assets/js/conult.js') }}"></script>
    <script src="{{ asset('./webassests/full-calender/lib/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    @stack('script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultify</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/conult-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('webassests/full-calender/lib/main.css') }}" />


    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('web2assets/css/conult.css') }}" />
    <link rel="stylesheet" href="{{ asset('web2assets/css/conult-responsive.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('webassests/fonts/Copperplate.ttf') }}" />
    <link rel="stylesheet" href="{{ asset('webassests/fonts/Balthazar-Regular.ttf') }}" /> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Times+New+Roman&display=swap">


    @livewireStyles
    @livewireScripts
    <script defer src="{{ asset('vendor/alpine.min.js') }}"></script>
    @stack('styles')

    <style>
        .consultation_loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{ asset('web2assets/images/logo.png') }}') 50% 50% no-repeat transparent;
            opacity: 1;
        }

        /*google translate Dropdown */

        #google_translate_element select {
            background: #f6edfd;
            color: #0e5916;
            border: none;
            border-radius: 3px;
            padding: 6px 8px
        }

        /*google translate link | logo */
        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        /* google translate banner-frame */

        .goog-te-banner-frame {
            display: none !important;
        }

        #goog-gt-tt,
        .goog-te-balloon-frame {
            display: none !important;
        }


        .goog-text-highlight {
            background: none !important;
            box-shadow: none !important;
        }

        ::marker {
            display: none !important;
        }

        .VIpgJd-ZVi9od-l4eHX-hSRGPd,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:link,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:visited,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:hover,
        .VIpgJd-ZVi9od-l4eHX-hSRGPd:active {
            display: none !important;
        }
        .VIpgJd-ZVi9od-l4eHX-hSRGPd{
            display: none !important;

        }
    </style>
</head>

<body>
    {{-- <div class="preloader">
    <img class="preloader__image" width="60" src="{{ asset('web2assets/images/loader.gif') }}" alt="" />
  </div> --}}
    <div class="loader"></div>
    <div class="consultation_loader" style="display:none"></div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('layouts.webheader')

        @isset($imageUrl)
            <section class="page-header mb-5">
                <div class="page-header-bg" style="background-image: url({{ asset($imageUrl) }})">
                </div>
                {{-- <div class="container">
                    <div class="page-header__inner">
                        <h2>{{ $heading }}</h2>
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">{{ $heading }}</li>
                        </ul>
                    </div>
                </div> --}}
            </section>
        @endisset

        @stack('header')
        {{ $slot }}

        @include('layouts.webfooter')


    </div><!-- /.page-wrapper -->




    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{ asset('web2assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('web2assets/vendors/timepicker/timePicker.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('web2assets/js/conult.js') }}"></script>
    <script src="{{ asset('webassests/full-calender/lib/main.js') }}"></script>
    <script src="{{ asset('webassests/full-calender/lib/locales-all.min.js') }}"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: "fr,en",
                autoDisplay: 'true',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
    </script>
    <script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    @stack('script')
    @stack('scripts')
</body>

</html>

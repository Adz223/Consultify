<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Titles
    ================================================== -->
    <title>Team Consultation</title>

    <!-- Custom Font
 ================================================== -->
    <link
        href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&amp;family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&amp;family=Barlow:wght@300;400;600;700&amp;display=swap"
        rel="stylesheet" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('./webassests/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/simple-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/odometer-theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/icofont.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./webassests/css/style.css') }}" />
    <script src="{{ asset('./webassests/js/modernizr.min.js') }}"></script>
    <link  rel="stylesheet" href="{{asset('./webassests/full-calender/lib/main.css')}}"/>

    @livewireStyles
    @livewireScripts
    <script defer src="{{ asset('vendor/alpine.min.js') }}"></script>
    @stack('styles')

</head>

<body>
    <!--********************************************************-->
    <!--********************* SITE CONTENT *********************-->
    <!--********************************************************-->
    <div class="site-content">
        @include('layouts.webheader')
        @isset($imageUrl)
        <div class="page-title-area bg-image" style="background-image: url('{{  $imageUrl }}')">

            <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <div class="page-header-content">
                              <div class="page-header-caption">
                                  <h2 class="page-title text-white">{{$heading}}</h2>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

        @endisset
        {{ $slot }}

        @include('layouts.webfooter')

    </div>
    <!--~~./ end site content ~~-->

    <!-- All The JS Files
   ================================================== -->
    <script src="{{ asset('./webassests/js/jquery.js') }}"></script>
    <script src="{{ asset('./webassests/js/popper.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/plugins.js') }}"></script>
    <script src="{{ asset('./webassests/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/simple-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/background-parallax.js') }}"></script>
    <script src="{{ asset('./webassests/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/swiper.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/packery-mode.pkgd.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/scrolla.jquery.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/odometer.min.js') }}"></script>
    <script src="{{ asset('./webassests/js/isInViewport.jquery.js') }}"></script>
    {{-- <script src="{{ asset('./webassests/js/contact.js') }}"></script> --}}
    <script src="{{ asset('./webassests/js/main.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{asset('./webassests/full-calender/lib/main.js')}}"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    @stack('scripts')
    <!-- main-js -->
</body>
</html>

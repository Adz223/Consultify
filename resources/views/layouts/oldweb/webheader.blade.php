<header class="site-header header-style-one">
    <style>
        .goog-te-gadget-icon {
            display: none;
        }

        . .goog-te-gadget-simple {
            background-color: transparent !important;
            border: 0 !important;
            font-size: 10pt;
            font-weight: 800;
            display: inline-block;
            padding: 10px 10px !important;
            cursor: pointer;
            zoom: 1;
        }

        .goog-te-gadget-simple span {
            color: #3e3065 !important;

        }

        .goog-te-banner-frame {
            display: none;
            /* margin-top: -20px; */
        }

        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            background-color: transparent !important;
        }
        body{
            top: 0px !important
        }
    </style>
    <div class="container-fluid" id="header-container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="navigation-area">
                    <!-- Site Branding -->
                    <div class="site-branding">
                        <a href="{{ route('home') }}">
                            <h2 class="text-white">
                                Team Consultation
                            </h2>
                            {{-- <img src="assets/images/logo/logo.png" alt="Site Logo" /> --}}
                        </a>
                    </div><!--  /.site-branding -->

                    <!-- Site Navigation -->
                    <div class="site-navigation">
                        <nav class="navigation">
                            <!-- Main Menu -->
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="mainmenu ">
                                        {{-- <li>
                                            <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
                                        </li> --}}
                                        @livewire('navbar-service-drop-down')
                                        <li>
                                            <a class="nav-link text-white" href="{{ route('contact') }}">Contact Us</a>
                                        </li>
                                        <li>
                                            <a class="nav-link text-white"
                                                href="{{ route('consultation.booking') }}">Book Consultation</a>
                                        </li>
                                        <li>
                                            <a class="nav-link text-white" href="/who-we-are">Who We Are?</a>
                                        </li>
                                        <li>
                                            <a class="nav-link text-white" href="/mission-vision">Mission Vision</a>
                                        </li>
                                        <li>
                                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li>
                                            <div id="google_translate_element"> </div>
                                        </li>
                                    </ul>
                                </div> <!-- /.hours-content-->
                            </div><!-- /.menu-wrapper -->
                        </nav>
                    </div><!--  /.site-navigation -->

                    <div class="header-navigation-right">
                        <!--~./ search-wrap ~-->
                        <div class="hamburger-menus">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!--~./ header-navigation-right ~-->
                </div><!-- /.navigation-area -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="mobile-sidebar-menu sidebar-menu">
        <div class="overlaybg"></div>
    </div>

</header>
@push('scripts')
    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $("#header-container");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });


        $(document).ready(function() {
            $('#google_translate_element').bind('DOMNodeInserted', function(event) {
                $('.goog-te-menu-value span:first').html('LANGUAGE');
                $('.goog-te-menu-frame.skiptranslate').load(function() {
                    setTimeout(function() {
                        $('.goog-te-menu-frame.skiptranslate').contents().find(
                            '.goog-te-menu2-item-selected .text').html('LANGUAGE');
                    }, 100);
                });
            });
        });

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: "en,fr,ar,es,it",
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
@endpush

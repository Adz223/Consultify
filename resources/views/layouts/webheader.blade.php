<header class="main-header clearfix">
  <div class="main-header__top clearfix">
    <div class="main-header__top-inner clearfix">
      <div class="main-header__top-left">
        <ul class="list-unstyled main-header__top-address">
          {{-- <li>
            <div class="icon">
              <span class="icon-pin"></span>
            </div>
            <div class="text">
              <p>504 4th Avenue South. Nashville, TN 37210</p>
            </div>
          </li> --}}
          <li>
            <div class="icon">
              <span class="icon-email"></span>
            </div>
            <div class="text">
              <p><a href="mailto:info@brightconsultingroup.com">info@brightconsultingroup.com</a></p>
            </div>
          </li>
          <li>
            <div class="icon">
              <span class="icon-phone"></span>
            </div>
            <div class="text">
              <p><a href="tel:1307776-0608">+1 615-200-0288</a></p>
            </div>
          </li>
        </ul>
      </div>
      <div class="main-header__top-right">
        <!-- <div class="main-header__top-right-social">
          {{-- <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a> --}}
          <div id='google_translate_element'></div>
        </div> -->
      </div>
    </div>
  </div>
  <nav class="main-menu clearfix">
    <div class="main-menu-wrapper clearfix">
      <div class="main-menu-wrapper__left">
        <div class="main-menu-wrapper__logo">
          <a href="{{ route('home') }}"><img src="{{ asset('web2assets/images/logo.png') }}"
              alt="Team Consultation" height="50"></a>
        </div>
        <div class="main-menu-wrapper__main-menu">
          <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
          <ul class="main-menu__list">
            <li><a href="{{ route('home') }}">Home</a></li>
            @livewire('navbar-service-drop-down')
            <li><a href="{{ route('consultation.booking') }}">Book Consultation</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('whoWeAre') }}">Who we are?</a></li>
            {{-- <li><a href="/website/mission">Misson Vision</a></li> --}}
            <li><a target="_blank" href="{{ route('login') }}">Login</a></li>
          </ul>
        </div>
      </div>
      {{-- <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__call">
                    <div class="main-menu-wrapper__call-icon">
                        <span class="icon-phone"></span>
                    </div>
                    <div class="main-menu-wrapper__call-number">
                        <p>Call Anytime</p>
                        <h5><a href="tel:1307776-0608">+ 1 (307) 776-0608</a></h5>
                    </div>
                </div>
            </div> --}}
    </div>
  </nav>
</header>
<div class="stricky-header stricked-menu main-menu main-menu-three">
  <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<div class="mobile-nav__wrapper">
  <div class="mobile-nav__overlay mobile-nav__toggler"></div>
  <!-- /.mobile-nav__overlay -->
  <div class="mobile-nav__content">
    <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

    <div class="logo-box">
      <a href="{{ route('home') }}" aria-label="logo image"><img src="{{ asset('assets/images/logo.png') }}"
          height="50" alt="" /></a>
    </div>
    <!-- /.logo-box -->
    <div class="mobile-nav__container"></div>
    <!-- /.mobile-nav__container -->

    <ul class="mobile-nav__contact list-unstyled">
      <li>
        <i class="fa fa-envelope"></i>
        <a href="mailto:needhelp@packageName__.com">needhelp@conult.com</a>
      </li>
      <li>
        <i class="fa fa-phone-alt"></i>
        <a href="tel:666-888-0000">666 888 0000</a>
      </li>
    </ul><!-- /.mobile-nav__contact -->
    <div class="mobile-nav__top">
      <div class="mobile-nav__social">
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-facebook-square"></a>
        <a href="#" class="fab fa-pinterest-p"></a>
        <a href="#" class="fab fa-instagram"></a>
      </div><!-- /.mobile-nav__social -->
    </div><!-- /.mobile-nav__top -->



  </div>
  <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

{{-- <div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div> --}}
<!-- /.search-popup -->

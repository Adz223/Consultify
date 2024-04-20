 <!--Site Footer Start-->
 <footer class="site-footer">
   <div class="container">
     <div class="site-footer__top" style="padding-top: 61px">
       <div class="row">
         <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
           <div class="site-footer__top-left">
             <div class="site-footer__top-logo-content">
               <!-- <a href="index.html" class="text-white">Team Consultation</a> -->
               <a href="{{ route('home') }}"><img src="{{ asset('./web2assets/images/logo.png') }}" height="50" alt=""></a>
               <!-- <p class="site-footer__top-text">Welcome to our Team consultation</p> -->
             </div>
             {{-- <div class="site-footer__top-newsletter">
                            <h5 class="site-footer__top-newsletter-title">Subsrcibe for Latest Articles and
                                Resources</h5>
                            <form class="site-footer__top-newsletter-form">
                                <div class="site-footer__top-newsletter-input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                    <button type="submit" class="site-footer__top-newsletter-btn">Go</button>
                                </div>
                            </form>
                        </div> --}}
           </div>
           {{-- <a href="{{ route('home') }}"><img src="{{ asset('./web2assets/images/logo.png') }}"
                        alt="Team Consultation"></a> --}}
         </div>
         <div class="col-xl-8 col-lg-8">
           <div class="site-footer__top-right">
             <div class="site-footer__top-widget-box">
               <div class="row">
                 <div class="col-xl-3 col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                   <div class="footer-widget__column footer-widget__explore clearfix">
                     <h3 class="footer-widget__title">Explore</h3>
                     <ul class="footer-widget__explore-list list-unstyled clearfix">
                       <li><a href="{{ route('services') }}">Services</a></li>
                       <!-- <li><a href="about.html">Who we Are?</a></li> -->
                       <li><a href="{{ route('consultation.booking') }}">Book Consultation</a></li>
                       <li><a href="/#our-mission">Mission vision</a></li>
                       <!-- <li><a href="contact.html">Contact</a></li> -->
                     </ul>
                   </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                   <div class="footer-widget__column footer-widget__links clearfix">
                     <h3 class="footer-widget__title">Links</h3>
                     <ul class="footer-widget__links-list list-unstyled clearfix">
                       <li><a href="{{ route('whoWeAre') }}">Who we Are?</a></li>
                       <!-- <li><a href="about.html">Become a Coach</a></li> -->
                       <!-- <li><a href="about.html">Make Appointment</a></li> -->
                       <li><a href="{{ route('contact') }}">Contact</a></li>
                     </ul>
                   </div>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-4 wow fadeInUp" data-wow-delay="300ms">
                   <div class="footer-widget__column footer-widget__contact clearfix">
                     <h3 class="footer-widget__title">Contact</h3>
                     {{-- <p class="footer-widget__contact-text">504 4th Avenue South. Nashville, TN 37210</p> --}}
                     <a href="tel:+1 615-200-0288">info@brightconsultingroup.com</a>
                     <a href="tel:+1 615-200-0288">+1 615-200-0288</a>
                   </div>
                 </div>
               </div>
             </div>
             <div class="site-footer__top-contact-details wow fadeInUp" data-wow-delay="400ms">
               <div class="site-footer__top-right-social">
                 <a href="#"><i class="fab fa-twitter"></i></a>
                 <a href="#"><i class="fab fa-facebook"></i></a>
                 <a href="#"><i class="fab fa-pinterest-p"></i></a>
                 <a href="#"><i class="fab fa-instagram"></i></a>
               </div>
               {{-- <div class="site-footer__top-right-phone">
                                <p class="site-footer__top-right-phone-tagline">Call Anytime</p>
                                <a href="tel:1307776-0608">+ 11 1112121</a>
                            </div> --}}
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="site-footer__bottom m-0">
       <p class="site-footer__bottom-text">© 2023 Copyrights by <a href="{{ route('home') }}">Consultify</a> |
         Powered by <a href="hnhtechsolutions.com" target="_blank">Hnh Tech Solutions</a></p>
     </div>
   </div>
 </footer>
 <!--Site Footer End-->

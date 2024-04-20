<div>
    <!--Main Slider Start-->
    <section class="main-slider main-slider-three">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{"slidesPerView": 1, "loop": true,   "effect": "fade",
        "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
        },
        "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
            "delay": 5000
        }}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image: url({{ asset('./web2assets/images/Home3.jpg') }});">
                    </div>
                    <div class="main-slider-three-shape"><img
                            src="{{ asset('./web2assets/images/shapes/main-slider-three-shape.png') }}" alt="">
                    </div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{ asset('./web2assets/images/Home2.jpg') }});">
                    </div>
                    <div class="main-slider-three-shape"><img
                            src="{{ './web2assets/images/shapes/main-slider-three-shape.png' }}" alt=""></div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="main-slider__content">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url({{ asset('./web2assets/images/Home1.jpg') }});">
                    </div>
                    <div class="main-slider-three-shape"><img
                            src="{{ asset('./web2assets/images/shapes/main-slider-three-shape.png') }})" alt="">
                    </div>
                    <!-- /.image-layer -->
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="main-slider__content">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- If we need navigation buttons -->
            {{-- <div class="main-slider__nav">
                <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                    <i class="icon-right-arrow icon-left-arrow"></i>
                </div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                    <i class="icon-right-arrow"></i>
                </div>
            </div> --}}
        </div>
    </section>
    <style>
        .hero-content {
            position: absolute;
            top: 9%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 30;
            padding-bottom: 215px;
        }

        .slideheading {
            margin: 0;
            color: var(--conult-white);
            transition-delay: 1000ms;
            letter-spacing: -.04em;
            font-size: 1.8rem;
            line-height: 80px;
            font-weight: 700
        }

        @media screen and (max-width: 768px) {
            .hero-content {
                top: 6%;
                padding-bottom: 100px;
            }

            .slideheading {
                margin: 0;
                color: var(--conult-white);
                transition-delay: 1000ms;
                letter-spacing: -.04em;
                font-size: 2rem;
                line-height: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            .hero-content {
                top: 6%;
                padding-bottom: 50px;
            }
        }
    </style>
    <div class="hero-content container">

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 ">
                <div style="position: relative;display: block;">
                    <h4 class="slideheading">Consultify: Shaping Futures, Connecting Worlds!</h4>
                    <p class="text-white fw-bold" style="font-family: Copperplate" {{-- style="    font-family: sans-serif;" --}}>Are you looking to take your
                        education/business to the next level, but not
                        sure
                        where to start? Our team of experts is here to help! We invite you to take
                        advantage of our free consultation offer. During this consultation, we will
                        listen to your goals and challenges and provide customized solutions and
                        recommendations to help you achieve success. Our goal is to empower your growth
                        and elevate your success. So why wait? Book your free consultation today and
                        take the first step towards a brighter future</p>
                    <div class="main-slider-three__bottom">
                        <a href="{{ route('consultation.booking') }}" class="thm-btn main-slider-three__btn">free
                            consultation</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Main Slider End-->

    <!--Brand One Start-->
    {{-- <section class="brand-three">
        <div class="container">
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-2.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-3.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-4.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-5.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-2.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-3.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-4.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('./web2assets/images/brand/brand-3-5.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            </div>
        </div>
    </section> --}}
    <!--Brand One End-->
    <!--real world Start-->
    <section class="real-world">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="real-world__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Welcome To</span>
                            <h4 class="section-title__title fs-4 fw-bold">The Real World Experience</h4>
                        </div>
                        <p class="real-world__left-text">Consultify is dedicated to excellence through real-world experience in the fields of education, global academic partnership development, and lifelong coaching</p>
                        <br />
                        <h2 class="section-title__title fs-4 fw-bold">Our focus is:</h2>
                        <ul class="list-unstyled real-world__points mt-0">
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p  style=" font-family: Hoefler;text-align: justify;">Transforming Education with Real-World Expertise and Data-Driven Insights</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p  style=" font-family: Hoefler;text-align: justify;">Elevating Global Academic Partnership Development</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p  style=" font-family: Hoefler;text-align: justify;">Empowering Growth Through Lifelong Coaching and Real-World Experience"</p>
                                </div>
                            </li>
                        </ul>
                        {{-- <div class="real-world__progress">
                            <div class="real-world__progress-single">
                                <h4 class="real-world__progress-title">Consulting</h4>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="77%">
                                        <div class="count-text">77%</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-xl-4">
                    <div class="real-world__middle">
                        <div class="real-world__img">
                            <img src="{{ asset('./web2assets/bright/home/400-528.jpg') }}" alt="">
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-4">
                    <div class="real-world__counter-box">
                        <ul class="list-unstyled real-world__counter">
                            <li class="real-world__counter-single">
                                <div class="real-world__counter-content">
                                    <h3 class="odometer" data-count="">0</h3>
                                    <p class="real-world__counter-text">Completed Cases</p>
                                </div>
                                <div class="real-world__counter-icon">
                                    <span class="icon-help"></span>
                                </div>
                            </li>
                            <li class="real-world__counter-single">
                                <div class="real-world__counter-content">
                                    <h3 class="odometer" data-count="">0</h3>
                                    <p class="real-world__counter-text">Happy Customers</p>
                                </div>
                                <div class="real-world__counter-icon">
                                    <span class="icon-customer-review"></span>
                                </div>
                            </li>
                            <li class="real-world__counter-single">
                                <div class="real-world__counter-content">
                                    <h3 class="odometer" data-count="">0</h3>
                                    <p class="real-world__counter-text">Expert Consultant</p>
                                </div>
                                <div class="real-world__counter-icon">
                                    <span class="icon-consultant"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--real world End-->
    <!--College acceptence Start-->
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="real-world__left">
                        <div class="section-title text-left">
                            {{-- <span class="section-title__tagline">Welcome To</span> --}}
                            <h2 class="section-title__title fs-4 fw-bold"><b>College Admissions Consulting Experts For College
                                Acceptance</b></h2>
                        </div>


                    </div>
                </div>

            </div>
            <div class="row">
                {{-- <div class="col-md-5">
            
                </div> --}}
                {{-- <div class="col-md-12 text-justified"> --}}
                    <img class="img-fluid float-start col-lg-4" style="object-fit: contain" src="{{ asset('./web2assets/images/College_Accept.jpg') }}"
                    alt="">
                    <p style=" font-family: Hoefler;text-align: justify;" class="col-lg-8">Enrolling in a college is a profoundly momentous juncture in one's academic journey. This
                        juncture, while brimming with excitement, can also evoke a considerable degree of stress. It is
                        imperative to recognize that receiving acceptance offers from the most suitable institutions has
                        the potential to profoundly shape your future trajectory. Consequently, ensuring the utmost
                        quality and refinement of your admissions application becomes a paramount endeavor.This is where we step in. Our team of college admissions consultants is characterized by their
                        profound expertise in this domain. Possessing a wealth of experience and knowledge, they are
                        adept at tailoring your college applications to perfection, thus enhancing your prospects of
                        securing admission to the institution of your choice.For a comprehensive overview of the spectrum of college admissions consulting services we
                        provide, we invite you to explore the details below</p>
                {{-- </div> --}}
            </div>
            <div class="row mt-4">
              <div class="col-md-12 text-center">
                <h2 class="section-title__title fs-4 fw-bold"><b>College Admission Consulting Packages</b></h2>
              </div>
              <div class="col-md-12 mt-4">
                <div class="accordion" id="accordionExample">
                  {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne" >
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        COMPLETE COLLEGE APPLICATION PACKAGE
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body" style="font-family: Hoefler; text-align: justify;">
                        Consultify's admission consulting package is a comprehensive and client-centric solution that goes beyond traditional services. From the outset, the package ensures that all communication with the school of choice is handled with utmost precision, presenting the client in the best possible light. The process involves a meticulous assessment of the client's academic and extracurricular achievements, enabling the consultants to guide them in establishing the most compelling and tailored application. The implication for the client is significant, as the package is designed to enhance the odds of approval by strategically positioning their strengths and aspirations. Additionally, Consultify provides invaluable support in briefing and coaching clients, ensuring they are well-prepared for any admission tests or interviews they may encounter. The consultants remain steadfast in their commitment to the client's success, offering ongoing support and guidance until the client receives that coveted acceptance letter from their dream college. It's a holistic approach that underscores Consultify's dedication to facilitating each client's journey toward academic achievement and personal growth.

                      </div>
                    </div>
                  </div> --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        COMPLETE COLLEGE APPLICATION PACKAGE
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         Consultify's admission consulting package is a comprehensive and client-centric solution that goes beyond traditional services. From the outset, the package ensures that all communication with the school of choice is handled with utmost precision, presenting the client in the best possible light. The process involves a meticulous assessment of the client's academic and extracurricular achievements, enabling the consultants to guide them in establishing the most compelling and tailored application. The implication for the client is significant, as the package is designed to enhance the odds of approval by strategically positioning their strengths and aspirations. Additionally, Consultify provides invaluable support in briefing and coaching clients, ensuring they are well-prepared for any admission tests or interviews they may encounter. The consultants remain steadfast in their commitment to the client's success, offering ongoing support and guidance until the client receives that coveted acceptance letter from their dream college. It's a holistic approach that underscores Consultify's dedication to facilitating each client's journey toward academic achievement and personal growth.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        REJECTION REVIEW 
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body" style="font-family: Hoefler;text-align: justify;">
                        Consultify's Rejection Review Package is a specialized service designed to provide valuable insights and support to clients facing the disappointment of a denied application. The package includes a thorough review of the rejected application, offering a detailed explanation to the customer about the specific reasons for the denial. The experienced consultants at Consultify meticulously assess the causes of rejection, aiming to identify any weaknesses in the application. Moreover, they determine whether there is a viable ground for re-application. If a potential for reapplication exists, the package goes a step further by crafting the best possible strategy to strengthen the client's case. This comprehensive approach not only addresses the immediate setback but also empowers clients with the knowledge and guidance needed to navigate the reapplication process successfully. It reflects Consultify's commitment to helping individuals overcome setbacks, learn from the experience, and position themselves for a successful admission in subsequent attempts.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
    <section class="news-three p-0  py-5 pt-5 mt-0 mb-0">
      <div class="news-three-bg"></div>
      <div class="container">
        <p class="text-white text-center" style="font-family: Hoefler;">Are you interested in engaging in a one-on-one consultation with one of our esteemed college admissions consultants? Are you uncertain about which admissions consulting service aligns most optimally with your unique needs and aspirations?</p>
      <p class="text-white text-center">We cordially invite you to take advantage of our complimentary consultation service. During this session, our experienced professionals will provide personalized guidance and insights to assist you in navigating the intricate college admissions process, ensuring you make informed decisions tailored to your specific circumstances.</p>
      </div>
  </section>
    <!--College acceptence End-->

    <!--services Two Start-->
    {{-- @livewire('service') --}}
    <!--services Two End-->

    <!--Our Mission Start-->
    <section class="our-mission" id="our-mission">
        <div class="our-mission-bg-box">
            <div class="our-mission-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{ asset('./web2assets/bright/home/1920-1200.jpg') }})">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="our-mission__inner">
                        <div class="row justify-content-center">
                            <h4 class="text-white"><b>OUR MISSION</b></h4>
                            <p class="text-white" style="font-size: 16px">Is to provide exceptional consulting services
                                that
                                empower clients to achieve their goals and reach their full potential. </p>
                            <h4 class="text-white"><b>OUR VISION</b></h4>
                            <p class="text-white" style="font-size: 16px;font-family: Hoefler;">Is to be the leading consulting firm that
                                consistently delivers innovative
                                and
                                customized solutions to meet the unique needs of each client. Our goal is to build
                                long-lasting relationships based on trust, expertise, and results.</p>
                            <h4 class="text-white"><b>OUR VALUES</b></h4>
                            <p class="text-white" style="font-size: 16px;font-family: Hoefler;">Are integrity, excellence, innovation,
                                collaboration, and service to our clients.</p>
                        </div>
                        {{-- <p class="text-white" style="font-size: 16px"> <b>OUR MISSION</b> is to provide exceptional consulting services that
                            empower clients to achieve their goals and reach their full potential.
                            <br />
                            <b>OUR VISION</b> is to be the leading consulting firm that consistently delivers innovative
                            and
                            customized solutions to meet the unique needs of each client. Our goal is to build
                            long-lasting relationships based on trust, expertise, and results.
                            Values: Integrity, excellence, innovation, collaboration, and service to our clients.
                        </p>
                        <a href="{{ route('consultation.booking') }}" class="thm-btn our-mission__btn">free
                            consultation</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Our Mission End-->

    <!--We Improve Start-->
    {{-- <section class="we-improve clearfix">
        <div class="we-improve-bg" style="background-image: url({{ asset('./web2assets/bright/home/862-689.jpg') }})">
        </div>
        <div class="container">
            <div class="we-improve__inner">
                <div class="section-title text-left">
                    <span class="section-title__tagline">experts & Creatives</span>
                    <h2 class="section-title__title">We Improve Business</h2>
                </div>
                <p class="we-improve__text">Alteration in some form, lipsum is simply free text by injected humou
                    or
                    randomised words even believable.</p>
                <div class="we-improve__funded">
                    <div class="we-improve__funded-img">
                        <img src="{{ asset('./web2assets/images/resources/we-improve-funded-img.jpg') }})"
                            alt="">
                    </div>
                    <p class="we-improve__funded-content">Our Consulting & Finance Company Funded in
                        <span>1987</span>
                    </p>
                </div>
                <ul class="list-unstyled we-improve__points">
                    <li>
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="text">
                            <p  style=" font-family: Hoefler;text-align: justify;">Nsectetur cing elit.</p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="text">
                            <p  style=" font-family: Hoefler;text-align: justify;">Suspe ndisse suscip leo.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section> --}}
    <!--We Improve End-->

    <!--Team One Start-->
    {{-- <section class="team-one" style="padding-bottom: 145px;">
    <div class="team-one__container">
      <div class="section-title text-center">
        <span class="section-title__tagline">Professional Consultant</span>
        <h2 class="section-title__title">Meet Our Experts</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
          <!--Team One Single-->
          <div class="team-one__single">
            <div class="team-one__img">
              <img src="{{ asset('./web2assets/bright/who are we/sarah albert.jpg') }}" alt="">
              <ul class="list-unstyled team-one__social">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="team-one__content">
              <h4 class="team-one__name">Sarah Albert</h4>
              <p class="team-one__title">Consultant</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
          <!--Team One Single-->
          <div class="team-one__single">
            <div class="team-one__img">
              <img src="{{ asset('./web2assets/bright/who are we/mike hardson.jpg') }}" alt="">
              <ul class="list-unstyled team-one__social">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="team-one__content">
              <h4 class="team-one__name">Mike Hardson</h4>
              <p class="team-one__title">Manager</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
          <!--Team One Single-->
          <div class="team-one__single">
            <div class="team-one__img">
              <img src="{{ asset('./web2assets/bright/who are we/jessica brown.jpg') }}" alt="">
              <ul class="list-unstyled team-one__social">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="team-one__content">
              <h4 class="team-one__name">Jessica Brown</h4>
              <p class="team-one__title">CO - Founder</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
          <!--Team One Single-->
          <div class="team-one__single">
            <div class="team-one__img">
              <img src="{{ asset('./web2assets/bright/who are we/DavidCooper.jpg') }}" alt="">
              <ul class="list-unstyled team-one__social">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="team-one__content">
              <h4 class="team-one__name">David Cooper</h4>
              <p class="team-one__title">Consultant</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!--Team One End-->

    <!--Feature Two Start-->
    {{-- <section class="feature-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <!--Feature Two Single-->
                    <div class="feature-three__single">
                        <div class="feature-three__icon">
                            <span class="icon-help"></span>
                        </div>
                        <div class="feature-three__content">
                            <h4 class="feature-three__title">Get Professional Advice</h4>
                            <p class="feature-three__text">There are many variations of available but the majority
                                have suffered alteration.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <!--Feature Two Single-->
                    <div class="feature-three__single">
                        <div class="feature-three__icon">
                            <span class="icon-consultant"></span>
                        </div>
                        <div class="feature-three__content">
                            <h4 class="feature-three__title">Trusted & Professional</h4>
                            <p class="feature-three__text">There are many variations of available but the majority
                                have suffered alteration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Feature Two End-->

    <!--News Three Start-->
    {{-- <section class="news-three">
        <div class="news-three-bg"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">direct from the blog</span>
                <h2 class="section-title__title">News & Articles</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('./web2assets/bright/home/370-307 (1).jpg') }}" alt="">
                            <a href="#">
                                <span class="news-one__plus"></span>
                            </a>
                            <div class="news-one__date">
                                <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="#">Long Term Advice to Grow Businesses</a>
                            </h3>
                            <p class="news-one__text">Aellentesque porttitor lacus quis enim varius sed efficitur
                                turpis gilla sed sit amet.</p>
                            <div class="news-one__bottom">
                                <a href="#" class="news-one__btn">Read More</a>
                                <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('./web2assets/bright/home/370-307 (2).jpg') }}" alt="">
                            <a href="#">
                                <span class="news-one__plus"></span>
                            </a>
                            <div class="news-one__date">
                                <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="#">DevOps. Nano technology along the</a>
                            </h3>
                            <p class="news-one__text">Aellentesque porttitor lacus quis enim varius sed efficitur
                                turpis gilla sed sit amet.</p>
                            <div class="news-one__bottom">
                                <a href="#" class="news-one__btn">Read More</a>
                                <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ asset('./web2assets/bright/home/370-307 (3).jpg') }}" alt="">
                            <a href="#">
                                <span class="news-one__plus"></span>
                            </a>
                            <div class="news-one__date">
                                <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="#">Capitalize on low hanging fruit to</a>
                            </h3>
                            <p class="news-one__text">Aellentesque porttitor lacus quis enim varius sed efficitur
                                turpis gilla sed sit amet.</p>
                            <div class="news-one__bottom">
                                <a href="#" class="news-one__btn">Read More</a>
                                <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--News Three End-->
    {{-- 3 Steps  --}}
    <section class="news-three">
      <div class="news-three-bg"></div>
      <div class="container">
          <div class="section-title text-center">
              {{-- <span class="section-title__tagline">direct from the blog</span> --}}
              <h2 class="section-title__title"><b>3 Steps to Getting Into Your Dream College</b></h2>
          </div>
          <div class="row">
              <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                  <!--News One Single-->
                  <div class="news-one__single">
                      <div class="news-one__img">
                          <img src="{{ asset('./web2assets/images/step1.jpg') }}" alt="">
                          {{-- <a href="#">
                              <span class="news-one__plus"></span>
                          </a> --}}
                          {{-- <div class="news-one__date">
                              <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                          </div> --}}
                      </div>
                      <div class="news-one__content">
                          {{-- <ul class="list-unstyled news-one__meta">
                              <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                              <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                              </li>
                          </ul> --}}
                          <h3 class="news-one__title text-center">
                              <a href="#" class="text-white fs-5  fw-bold">Collaborate with an Expert.</a>
                          </h3>
                          <p class="news-one__text text-white" style="font-family:Copperplate;text-align: center">
                            Forge a partnership with one of our exceptionally seasoned admissions consultants.
                           </p>
                          {{-- <div class="news-one__bottom">
                              <a href="#" class="news-one__btn">Read More</a>
                              <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                          </div> --}}
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <!--News One Single-->
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{asset('/web2assets/images/step2.png')}}" alt="">
                        {{-- <a href="#">
                            <span class="news-one__plus"></span>
                        </a> --}}
                        {{-- <div class="news-one__date">
                            <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                        </div> --}}
                    </div>
                    <div class="news-one__content">
                        {{-- <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                            </li>
                        </ul> --}}
                        <h3 class="news-one__title text-center">
                            <a href="#" class="text-white fs-5  fw-bold">Apply with Self-Assurance. </a>
                        </h3>
                        <p class="news-one__text text-white" style="font-family:Copperplate;text-align: center">Present an engaging application that underscores your individuality and leaves an enduring impression as a candidate.
                         </p>
                        {{-- <div class="news-one__bottom">
                            <a href="#" class="news-one__btn">Read More</a>
                            <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <!--News One Single-->
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ asset('./web2assets/images/step3.png') }}"  style="width:122%" alt="">
                        {{-- <a href="#">
                            <span class="news-one__plus"></span>
                        </a> --}}
                        {{-- <div class="news-one__date">
                            <p  style=" font-family: Hoefler;text-align: justify;">20 oct</p>
                        </div> --}}
                    </div>
                    <div class="news-one__content">
                        {{-- <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                            </li>
                        </ul> --}}
                        <h3 class="news-one__title text-center">
                            <a href="#" class="text-white fs-5 fw-bold text-capitalize">Receive Your Acceptance Letter </a>
                        </h3>
                        <p class="news-one__text text-white" style="font-family:Copperplate;text-align: center">Commend your dedication and achievements, then prepare to embark on the next chapter of your journey. </p>
                        {{-- <div class="news-one__bottom">
                            <a href="#" class="news-one__btn">Read More</a>
                            <a href="#" class="news-one__arrow"><span class="icon-right-arrow"></span></a>
                        </div> --}}
                    </div>
                </div>
            </div>
          </div>
      </div>
  </section>
    <section class="mb-5">
      <div class="container">
          {{-- <div class="row">
              <div class="col-xl-12">
                  <div class="real-world__left"> --}}
                      {{-- <div class="section-title text-left"> --}}
                          {{-- <span class="section-title__tagline">Welcome To</span> --}}
                          {{-- <h2 class="section-title__title">Why Choose Us for College Admissions Consulting?</h2>
                      </div> --}}
                      {{-- <p class="">Gaining admission to institutions of higher education is a notably challenging endeavor, and securing a position within a prestigious university presents an even more formidable challenge. Prospective applicants often find themselves confronting a complex and intricate admissions process that can easily lead to feelings of overwhelm. When engaging with Accepted, we endeavor to simplify and streamline this process, thereby establishing a solid foundation for genuine success. The following are salient details regarding our services: </p>
                      <div class="row mb-5">
                        <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"> --}}
                            <!--Feature Two Single-->
                            {{-- <div class="feature-three__single">
                         
                                <div class="feature-three__content">
                                    <h4 class="feature-three__title">	Proven Track Record</h4>
                                    <p class="feature-three__text">Over the years, we have facilitated successful admissions for applicants to over 115 esteemed universities.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"> --}}
                            <!--Feature Two Single-->
                            {{-- <div class="feature-three__single">
                            
                                <div class="feature-three__content">
                                    <h4 class="feature-three__title"> Established Expertise</h4>
                                    <p class="feature-three__text">Founded in 1994, Accepted stands as one of the longest-standing admissions consulting firms in operation today.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"> --}}
                            <!--Feature Two Single-->
                            {{-- <div class="feature-three__single"> --}}
                                {{-- <div class="feature-three__icon">
                                    <span class="icon-help"></span>
                                </div> --}}
                                {{-- <div class="feature-three__content">
                                    <h4 class="feature-three__title">Holistic Approach</h4>
                                    <p class="feature-three__text">We embrace a comprehensive approach to admissions consulting. Our commitment to transparency is manifest through the provision of valuable admissions-related resources, including free webinars, blogs, videos, and our informative Admissions Straight Talk podcast.</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"> --}}
                            <!--Feature Two Single-->
                            {{-- <div class="feature-three__single">
                            
                                <div class="feature-three__content">
                                    <h4 class="feature-three__title">Tangible Value</h4>
                                    <p class="feature-three__text">The quality of our services is discernible, and the positive feedback from our clientele underscores the substantial worth of the investment in our services, particularly when the long-awaited acceptance letter materializes.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                      {{-- <div class="real-world__progress">
                          <div class="real-world__progress-single">
                              <h4 class="real-world__progress-title">Consulting</h4>
                              <div class="bar">
                                  <div class="bar-inner count-bar" data-percent="77%">
                                      <div class="count-text">77%</div>
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                  {{-- </div>
              </div> --}}
              {{-- <div class="col-xl-4">
                  <div class="real-world__middle">
                      <div class="real-world__img">
                          <img src="{{ asset('./web2assets/bright/home/400-528.jpg') }}" alt="">
                      </div>
                  </div>
              </div> --}}
              {{-- <div class="col-xl-4">
                  <div class="real-world__counter-box">
                      <ul class="list-unstyled real-world__counter">
                          <li class="real-world__counter-single">
                              <div class="real-world__counter-content">
                                  <h3 class="odometer" data-count="">0</h3>
                                  <p class="real-world__counter-text">Completed Cases</p>
                              </div>
                              <div class="real-world__counter-icon">
                                  <span class="icon-help"></span>
                              </div>
                          </li>
                          <li class="real-world__counter-single">
                              <div class="real-world__counter-content">
                                  <h3 class="odometer" data-count="">0</h3>
                                  <p class="real-world__counter-text">Happy Customers</p>
                              </div>
                              <div class="real-world__counter-icon">
                                  <span class="icon-customer-review"></span>
                              </div>
                          </li>
                          <li class="real-world__counter-single">
                              <div class="real-world__counter-content">
                                  <h3 class="odometer" data-count="">0</h3>
                                  <p class="real-world__counter-text">Expert Consultant</p>
                              </div>
                              <div class="real-world__counter-icon">
                                  <span class="icon-consultant"></span>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div> --}}
           {{-- </div> --}}
      </div> 
  </section>
  <section class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                    <div class="section-title">
                        {{-- <span class="section-title__tagline">Welcome To</span> --}}
                        <h4 class="section-title__title fs-3 text-center"><b>Why Choose a Consultify College Admission Consultant?</b></h4>
                    </div>
                    {{-- <p class="">
                        When determining the selection of a service provider for your college admission consultancy, it is of paramount importance to exercise discernment, given the abundance of services available in the market, not all of which may be in your best interest. At Consultify, we firmly uphold our commitment to consistently go above and beyond to ensure the success and satisfaction of our clients. Presented below are several compelling reasons to consider conducting business with our organization.
                        : </p>
                    <div class="row">
                        <div class="col-xl-12 mb-2 col-lg-12 mb-2 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;"> --}}
                            {{-- <!--News One Single-->
                            <div class="news-one__single">
                                
                                <div class="news-one__content">
                                    
                                    <h3 class="news-one__title ">
                                        <a href="#" class="text-white fs-4 fw-bold">Compatibility.</a>
                                    </h3>
                                    <p class="news-one__text text-white">  Our process of consultant selection is deliberate and precise, eschewing randomness. Meticulous attention is devoted to identifying the most suitable consultant, one who can adeptly comprehend your unique experiences, aspirations, and work methodologies. This purposeful pairing ensures that your consultant becomes an ideal collaborator in crafting an application that authentically reflects your full potential.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2 col-lg-12 mb-2 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;"> --}}
                            <!--News One Single-->
                            {{-- <div class="news-one__single">
                                
                                <div class="news-one__content">
                                    
                                    <h3 class="news-one__title ">
                                        <a href="#" class="text-white fs-4 fw-bold">Consistency.</a>
                                    </h3>
                                    <p class="news-one__text text-white">We eschew the transitory nature of ephemeral application review services. Throughout your engagement, you will maintain an enduring partnership with a single consultant who will become intimately acquainted with your strengths and weaknesses. They will acquire a profound understanding of your personal narrative and possess the acumen to assist you in its eloquent articulation.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2 col-lg-12 mb-2 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;"> --}}
                            <!--News One Single-->
                            {{-- <div class="news-one__single">
                                <div class="news-one__content">
                                    
                                    <h3 class="news-one__title ">
                                        <a href="#" class="text-white fs-4 fw-bold"> Advocacy</a>
                                    </h3>
                                    <p class="news-one__text text-white">When engaging with our seasoned professional consultants at a deeply personal level, you transcend the status of a mere numerical statistic. Our consultants dedicate their unwavering commitment to their clients, demonstrating a level of investment in your aspirations that mirrors your own ardor. Beyond providing expert guidance and support, they assume the roles of your most fervent advocates, champions, and confidants. The competitive advantage conferred by such unwavering support cannot be overstated.</p>
                                    
                                </div>
                            </div> --}}
                            <style>
                                .laptop-video {
                                  width: 100%; /* Set the width to 100% of the container */
                                  /* max-width: 50%; Set a maximum width to avoid stretching on larger screens */
                                  /* height: 500px; Automatically adjust the height to maintain the video's aspect ratio */
                                  border-radius: 2%;
                                  display: block;
                                  margin: auto;
                                  height: auto;
                                }
                              </style>
                                <div class="row">
                                    <div class="col-lg-1">
                                    </div>
                                    <div class="col-lg-10 rounded py-3 bg-light p-2 text-dark bg-opacity-10">
                                        <video class="laptop-video" controls autoplay loop muted>
                                          <source src="{{ asset('./assets/Untitled video - Made with Clipchamp (6).mp4') }}" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>
                                      </div>
                                      {{-- <div class="col-lg-6">
                                        <p class="news-one__text" style="text-align: justify">We eschew the transitory nature of ephemeral application review services. Throughout your engagement, you will maintain an enduring partnership with a single consultant who will become intimately acquainted with your strengths and weaknesses. They will acquire a profound understanding of your personal narrative and possess the acumen to assist you in its eloquent articulation.
                                            Our process of consultant selection is deliberate and precise, eschewing randomness. Meticulous attention is devoted to identifying the most suitable consultant, one who can adeptly comprehend your unique experiences, aspirations, and work methodologies. This purposeful pairing ensures that your consultant becomes an ideal collaborator in crafting an application that authentically reflects 
                                </div> --}}
                                <div class="col-lg-1">
                                </div>
                        </div>
                    </div>
{{--             
                    <div class="real-world__progress">
                        <div class="real-world__progress-single">
                            <h4 class="real-world__progress-title">Consulting</h4>
                            <div class="bar">
                                <div class="bar-inner count-bar" data-percent="77%">
                                    <div class="count-text">77%</div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div> 
            {{-- <div class="col-xl-4">
                <div class="real-world__middle">
                    <div class="real-world__img">
                        <img src="{{ asset('./web2assets/bright/home/400-528.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="real-world__counter-box">
                    <ul class="list-unstyled real-world__counter">
                        <li class="real-world__counter-single">
                            <div class="real-world__counter-content">
                                <h3 class="odometer" data-count="">0</h3>
                                <p class="real-world__counter-text">Completed Cases</p>
                            </div>
                            <div class="real-world__counter-icon">
                                <span class="icon-help"></span>
                            </div>
                        </li>
                        <li class="real-world__counter-single">
                            <div class="real-world__counter-content">
                                <h3 class="odometer" data-count="">0</h3>
                                <p class="real-world__counter-text">Happy Customers</p>
                            </div>
                            <div class="real-world__counter-icon">
                                <span class="icon-customer-review"></span>
                            </div>
                        </li>
                        <li class="real-world__counter-single">
                            <div class="real-world__counter-content">
                                <h3 class="odometer" data-count="">0</h3>
                                <p class="real-world__counter-text">Expert Consultant</p>
                            </div>
                            <div class="real-world__counter-icon">
                                <span class="icon-consultant"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<section class="cta-one mb-5">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="cta-one__inner flex-column">
                <div>
                  <h4 class="cta-one__title" style="font-size:30px">Seize the change and get yourself admitted to your dream college.</h4>
                    <p class="text-white">If you're thinking about going to college for a bachelor's degree or beyond, remember that your choice of college will have a big impact on your future. Don't leave such an important decision to chance. Get professional help now, and you'll likely see this as a crucial step toward getting into college and eventually having a successful and satisfying career...</p>
                  </div>  
                  <a href="http://127.0.0.1:8000/consultation/booking" class="thm-btn cta-one__btn ">Book your free consultation Now</a>
                  <div class="cta-one__shape wow slideInLeft animated" data-wow-delay="100ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInLeft;">
                      <img src="{{ asset('web2assets/images/shapes/cta-one-shape.png') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="real-world__left">
                <div class="section-title text-left">
                    <h2 class="section-title__title fs-5 text-center">Find your university of choice and we will handle the rest for you. You are one step away from your bright future. Make your selection today and let us get you all set and ready for a new adventure...</h2>
                    {{-- <h4 class="section-title__title fs-4 fw-bold"><b>Some Of The Universities Our Clients Have Been Accepted to...</b></h4> --}}
                </div>
            </div>
        </div>
        </div>
</div>
<style>
@-webkit-keyframes scroll {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  100% {
    -webkit-transform: translateX(calc(-250px * 35));
    transform: translateX(calc(-250px * 35));
  }
}

@keyframes scroll {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  100% {
    -webkit-transform: translateX(calc(-250px * 35));
    transform: translateX(calc(-250px * 35));
  }
}
.slider {
  background: pr;
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
  height: 100px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: 100%;
}
.slider::before,
.slider::after {
  background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 100px;
  position: absolute;
  width: 200px;
  z-index: 2;
}
.slider::after {
  right: 0;
  top: 0;
  -webkit-transform: rotateZ(180deg);
  transform: rotateZ(180deg);
}
.slider::before {
  left: 0;
  top: 0;
}
.slider .slide-track {
  -webkit-animation: scroll 80s linear infinite;
  animation: scroll 80s linear infinite;
  display: flex;
  width: calc(250px * 35);
}
.slider .slide {
  height: 100px;
  width: 250px;
  /* margin: 5px */
}
.slider .slide ,img {
 object-fit: contain
}

  </style>
  
  
  
  <section class="main-slider main-slider-three">
    <div class="slider">
      <div class="slide-track">
        <div class="slide">
          <img src="./web2assets/images/uni1.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni2.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni3.jpg" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni4.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni5.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni6.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni7.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni8.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
            <img src="./web2assets/images/uni9.png" height="100" width="250" alt=""  class="p-1 pe-5 ps-4">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni10.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni11.png" height="100" width="250" alt="">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni12.png" height="100" width="250" alt="" class="p-3">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni13.png" height="100" width="250" alt="" class="p-3">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni14.png" height="100" width="250" alt="" class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni15.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./web2assets/images/uni16.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c1.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c2.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c3.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c4.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c5.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c6.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c7.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c8.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c9.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c10.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c11.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c12.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c13.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c14.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c15.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c16.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c17.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c18.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c19.jpg" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
        <!-- Repeat the same slides to create a seamless loop -->
        <div class="slide">
          <img src="./web2assets/images/uni1.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni2.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni3.jpg" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni4.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni5.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni6.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni7.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni8.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni9.png" height="100" width="250" alt=""  class="p-1 pe-5 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni10.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni11.png" height="100" width="250" alt="">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni12.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni13.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni14.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4"> 
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni15.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
          <img src="./web2assets/images/uni16.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
        </div>
        <div class="slide">
            <img src="./assets/img/c1.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c2.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c3.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c4.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c5.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c6.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c7.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c8.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c9.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c10.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c11.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c12.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c13.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c14.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c15.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c16.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c17.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c18.png" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
          <div class="slide">
            <img src="./assets/img/c19.jpg" height="100" width="250" alt=""  class="p-1 pe-4 ps-4">
          </div>
      </div>
    </div>
  </section>
  {{-- list of logos --}}
  {{-- <div class="container py-5">
    <div class="row">
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" > <li>Trevecca Nazarene university</li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" ><li>Belmont university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" ><li>Vanderbilt university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" > <li>Middle Tennessee state university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" >  <li>Tennessee state university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" > <li>Lipscomb university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" >  <li>Fisk university </li></div>
                    <div class="col-lg-6 shadow py-2" style="font-family: Hoefler;" > <li>Volunteer state community college </li></div>
                    <div class="col-lg-12 shadow py-2" style="font-family: Hoefler;" >  <li>And any other college that you might find would be of a great added value to the list.</li>
                  </div>
                  </div>
                </div> --}}
  <!--real world End-->
    <!--Contact One Start-->
    @livewire('contact')
    <!--Contact One End-->
</div>

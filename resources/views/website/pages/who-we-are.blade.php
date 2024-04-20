@extends('website.layout.master')
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset('./web2assets/images/Who\ we\ are.png')}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Who we are?</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Who we are?</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Get To Know Start-->
    <section class="get-to-know">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="get-to-know__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">get to know us</span>
                            <h2 class="section-title__title">Work Together for a Business Success</h2>
                        </div>
                        <p class="get-to-know__text">Lorem ipsum dolor sit amet, consectetur nod adipisicing elit
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua lonm andhn.</p>
                        <ul class="list-unstyled get-to-know__points">
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p>Nsectetur cing elit.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p>Suspe ndisse suscipit sagittis leo.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p>Entum estibulum dignissim posuere.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="text">
                                    <p>Donec tristique ante vel sem dictum rhoncus.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="get-to-know__right">
                        <ul class="get-to-know__images list-unstyled">
                            <li>
                                <div class="get-to-know__img-1">
                                    <img src="{{asset('./web2assets/images/resources/get-to-know-img-1.jpg')}}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="get-to-know__img-2">
                                    <img src="{{asset('./web2assets/images/resources/get-to-know-img-2.jpg')}}" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Get To Know End-->

    <!--Brand One Start-->
    <section class="brand-one">
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
                        <img src="{{asset('./web2assets/images/brand/brand-1-1.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-3.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-4.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-5.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-1.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-2.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-3.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-4.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{asset('./web2assets/images/brand/brand-1-5.png')}}" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            </div>
        </div>
    </section>
    <!--Brand One End-->

    <!--Testimonial One Start-->
    <section class="testimonial-one">
        <div class="testimonial-one-map" style="background-image: url({{asset('./web2assets/images/shapes/testimonial-one-map.png')}})"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">our feedback list</span>
                <h2 class="section-title__title">What They’re Saying</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                            <p class="testimonial-one__text">Duis rhoncus orci utedn metus rhoncus, non is dictum
                                purus bibendum. Suspendisse id orci sit amet justo interdum hendrerit sagittis.</p>
                            <div class="testimonial-one__author">
                                <div class="testimonial-one__author-img">
                                    <img src="{{asset('./web2assets/images/testimonial/testi-author-1.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__author-details">
                                    <h4 class="testimonial-one__author-name">Christine Eve</h4>
                                    <p class="testimonial-one__author-title">Customer</p>
                                </div>
                            </div>
                            <div class="testimonial-one__quote-icon">
                                <img src="{{asset('./web2assets/images/icon/quote-icon.png')}}" alt="">
                            </div>
                        </div>
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                            <p class="testimonial-one__text">Duis rhoncus orci utedn metus rhoncus, non is dictum
                                purus bibendum. Suspendisse id orci sit amet justo interdum hendrerit sagittis.</p>
                            <div class="testimonial-one__author">
                                <div class="testimonial-one__author-img">
                                    <img src="{{asset('./web2assets/images/testimonial/testi-author-2.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__author-details">
                                    <h4 class="testimonial-one__author-name">Kevin Martin</h4>
                                    <p class="testimonial-one__author-title">Customer</p>
                                </div>
                            </div>
                            <div class="testimonial-one__quote-icon">
                                <img src="{{asset('./web2assets/images/icon/quote-icon.png')}}" alt="">
                            </div>
                        </div>
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </p>
                            <p class="testimonial-one__text">Duis rhoncus orci utedn metus rhoncus, non is dictum
                                purus bibendum. Suspendisse id orci sit amet justo interdum hendrerit sagittis.</p>
                            <div class="testimonial-one__author">
                                <div class="testimonial-one__author-img">
                                    <img src="{{asset('./web2assets/images/testimonial/testi-author-3.jpg')}}" alt="">
                                </div>
                                <div class="testimonial-one__author-details">
                                    <h4 class="testimonial-one__author-name">Jessica Brown</h4>
                                    <p class="testimonial-one__author-title">Customer</p>
                                </div>
                            </div>
                            <div class="testimonial-one__quote-icon">
                                <img src="{{asset('./web2assets/images/icon/quote-icon.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial One End-->

    <!--Counter One Start-->
    <section class="counter-one">
        <div class="counter-one-wrap">
            <div class="counter-one-shape" style="background-image: url({{asset('./web2assets/images/shapes/counter-one-shape.png')}})">
            </div>
            <div class="counter-one-img"><img src="{{asset('./web2assets/images/resources/counter-one-img.jpg')}}" alt=""></div>
            <div class="counter-one-shape-2"><img src="{{asset('./web2assets/images/shapes/counter-one-shape-2.png')}}" alt="">
            </div>
            <div class="counter-one-shape-3"><img src="{{asset('./web2assets/images/shapes/counter-one-shape-3.png')}}" alt="">
            </div>
            <div class="container">
                <div class="counter-one__top">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <h2 class="counter-one__top-title">We’re Able to Give Truly Financial Advices</h2>
                        </div>
                    </div>
                </div>
                <div class="counter-one__bottom">
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="counter-one__list list-unstyled">
                                <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                                    <div class="counter-one__icon">
                                        <span class="icon-help"></span>
                                    </div>
                                    <div class="counter-one__content">
                                        <h3 class="odometer" data-count="315">0</h3>
                                        <p class="counter-one__text">Completed Cases</p>
                                    </div>
                                </li>
                                <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                                    <div class="counter-one__icon">
                                        <span class="icon-customer-review"></span>
                                    </div>
                                    <div class="counter-one__content">
                                        <h3 class="odometer" data-count="965">0</h3>
                                        <p class="counter-one__text">Satisfied Customers</p>
                                    </div>
                                </li>
                                <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                                    <div class="counter-one__icon">
                                        <span class="icon-consultant"></span>
                                    </div>
                                    <div class="counter-one__content">
                                        <h3 class="odometer" data-count="888">00</h3>
                                        <p class="counter-one__text">Expert Consultant</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Counter One End-->

    <!--Team Two Start-->
    <section class="team-two">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Professional Consultant</span>
                <h2 class="section-title__title">Meet Our Experts</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <!--Team Two Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{asset('./web2assets/images/team/team-two-img-1.jpg')}}" alt="">
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
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Team Two Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{asset('./web2assets/images/team/team-two-img-2.jpg')}}" alt="">
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
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                    <!--Team Two Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{asset('./web2assets/images/team/team-two-img-3.jpg')}}" alt="">
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
            </div>
        </div>
    </section>
    <!--Team Two End-->

    <!--CTA One Start-->
    <section class="cta-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__inner">
                        <h2 class="cta-one__title">We’re Delivering the Best <br> Consulting & Finance Services</h2>
                        <a href="about.html" class="thm-btn cta-one__btn">free consultation</a>
                        <div class="cta-one__shape wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <img src="{{asset('./web2assets/images/shapes/cta-one-shape.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->
@endsection

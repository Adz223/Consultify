@extends('website.layout.master')
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{('./web2assets/images/Contact.jpg')}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Contact us</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="/website">Home</a></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Contact Page Google Map Start-->
    <section class="contact-page-google-map">
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                class="contact-page-google-map__one" allowfullscreen>

            </iframe>
        </div>
    </section>
    <!--Contact Page Google Map End-->

    <!--Contact Page Details Start-->
    <section class="contact-page-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page-details__left">
                        <h3 class="contact-page-details__title">Get to Know About Company</h3>
                        <div class="contact-page-details__content">
                            <div class="contact-page-details__content-img">
                                <img src="{{asset('./web2assets/images/resources/contact-page-details-content-img.jpg')}}" alt="">
                            </div>
                            <div class="contact-page-details__content-text-box">
                                <p class="contact-page-details__content-text-1">It is a long established fact that a
                                    reader will be distracted by the readable content of a page when looking at its
                                    layout.</p>
                                <p class="contact-page-details__content-text-2">Many desktop publishing packages and
                                    web page editors now use as their default model text.</p>
                                <h2 class="contact-page-details__sign">Team Consultation</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page-details__right">
                        <ul class="list-unstyled contact-page-details__list">
                            <li>
                                <span>Call Anytime</span>
                                <p><a href="tel:098765654">+ 92 (307) 776-4444</a></p>
                            </li>
                            <li>
                                <span>Send Email</span>
                                <p><a href="mailto:info@brightconsultingroup.com">info@brightconsultingroup.com</a></p>
                            </li>
                            <li>
                                <span>Visit Office</span>
                                <p>80 Broklyn Road Street <br> New York. USA</p>
                            </li>
                        </ul>
                        <div class="contact-page-details__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page Details End-->

    <!--contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Contact with us</span>
                <h2 class="section-title__title">Drop us a Message</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-page__form">
                        <form action="" class="comment-one__form contact-form-validated">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Your Name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email Address" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Phone Number" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Subject" name="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Write a Message"></textarea>
                                    </div>
                                    <button type="submit" class="thm-btn comment-form__btn">send a message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact Page End-->
@endsection
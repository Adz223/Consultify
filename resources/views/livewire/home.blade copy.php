<div class="swiper mySwiper img_main">
    <div class="swiper-wrapper">
        <div class="swiper-slide web-header slider1">

        </div>
        <div class="swiper-slide web-header slider2"></div>
        <div class="swiper-slide web-header slider3"></div>
    </div>
</div>
<div>
    <div id="hero-block" class="hero-block bg-white-smoke hero-block-one">
        <div class="social-status-area">
            <div class="social-status">
                <a href="#"><i class="icofont-facebook"></i></a>
                <a href="#"><i class="icofont-twitter"></i></a>
                <a href="#"><i class="icofont-dribbble"></i></a>
                <a href="#"><i class="icofont-behance"></i></a>
                <a href="#"><i class="icofont-pinterest"></i></a>
            </div>
        </div>
        <div class="waves-effect bottom" style="background-image: url('webassests/images/shape/shape-bottom1.png');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Testimonial Slider -->
                    <div id="hero-slider" class="swiper-container hero-slider-one">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hero-content-area">
                                    <h2 class="">
                                        <span>What is Lorem Ipsum?</span>
                                    </h2>
                                    <!-- /.hero-title -->
                                    <div class="hero-desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem
                                            Ipsum has been </p>
                                    </div>
                                    <!-- /.hero-content-area -->
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-content-area">
                                    <h2 class="">
                                        <span>Lorem Ipsum?</span>
                                    </h2>
                                    <!-- /.hero-title -->
                                    <div class="hero-desc">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem
                                            Ipsum has been </p>
                                    </div>
                                    <!-- /.hero-content-area -->
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-mockup-area">
                        <div class="hero-mockup-thumb one">
                            <img src="{{ asset('webassests/images/home.png') }}" alt="Thumb">
                        </div>
                    </div><!-- /.hero-mockup-area -->
                </div>
            </div>
        </div>
    </div>
    @livewire('service')
    {{-- @livewire('contact') --}}
</div>
@push('scripts')
    <script>
     

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush

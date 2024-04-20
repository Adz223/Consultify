{{-- <div class="page-title-area bg-image" style="background-image: url('./webassests/images/services-2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h2 class="page-title text-white">Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                                    <h2 class="hero-title">
                                        <span>Our Services?</span>
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
                                    <h2 class="hero-title">
                                        <span>Our Services?</span>
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
                            <img src="{{ asset('webassests/images/services.png') }}" alt="Thumb">
                        </div>
                    </div><!-- /.hero-mockup-area -->
                </div>
            </div>
        </div>
    </div>
    <div id="service-block" class="services-block style-one">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <h1 class="text-center">More Services</h1>
            </div>
            <div class="row align-items-center">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ asset('webassests/images/icon/services/1/1.png') }}" alt="Icon" />
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <h3 class="title">{{ $service->name }}</h3>
                                <p>{{ \Str::limit($service->name, 50, "...") }}</p>
                                <a class="read-more-text" href="{{ route('service', ['service' => $service->id]) }}">
                                    Learn More
                                    <i class="icofont-long-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $services->links() }}
        </div>
    </div>
</div>

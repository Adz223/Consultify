<section class="services-two">
    <div class="container">
        <div class="section-title text-center">
            {{-- <span class="section-title__tagline">What we’re doing</span> --}}
            <h2 class="section-title__title">OUR SERVICES</h2>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <!--services Two Single-->
                    <div class="services-two__single">
                        <h3 class="services-two__title">
                            <a href="{{ route('service', ['service' => $service->id]) }}">
                                {{ $service->name }} <br>
                            </a>
                        </h3>
                        <p class="services-two__text">{{ Str::limit($service->description, 50, '...') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

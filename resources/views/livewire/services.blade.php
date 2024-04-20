<section class="services-page">
  <div class="container">
    <div class="row">
      @foreach ($services as $service)
        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
          <!--Services One Single-->
          <div class="services-one__single">
            <div class="services-one__img-box">
              <div class="services-one__img">
                <img src="{{ asset($service->image_url) }}" alt="">
              </div>
              {{-- <div class="services-one__icon">
                <span class="icon-creative"></span>
              </div> --}}
            </div>
            <div class="services-one__content">
              <h3 class="services-one__title">
                <a href="{{ route('service', ['service' => $service->id]) }}">{{ $service->name }}</a>
              </h3>
              {{-- <p class="services-one__text">{{ \Str::limit($service->name, 50, '...') }}</p> --}}
              <div class="services-one__bottom">
                <a href="{{ route('booking', ['service' => $service->id]) }}" class="services-one__btn">Book Now</a>
                <a href="{{ route('service', ['service' => $service->id]) }}" class="services-one__arrow"><span
                    class="icon-right-arrow"></span></a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
      {{ $services->links() }}
    </div>
  </div>
</section>

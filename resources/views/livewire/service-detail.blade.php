<div>
  <section class="services-page">
    <div class="container">
      <div class="section-title text-center">
        <h2 class="section-title__title">{{ $service->name }}</h2>
      </div>
      <br />
      <div class="row">
        <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
          <!--Services One Single-->
          <div class="services-one__single">
            <div class="services-one__img-box">
              <div class="services-one__img">
                <img src="{{ asset($service->image_url) }}" alt="">
              </div>
            </div>
            <div class="services-one__content">
              <h3 class="services-one__title"><a href="javascript:viod(0)">{{ $service->name }}</a></h3>
              <p class="services-one__text">{!! $service->description !!}</p>
              <p class="services-one__text"> 
              </p>
              {{-- <p class="services-one__text" style="font-weight: bold">${{ $service->price }}</p> --}}
              <div class="services-one__bottom">
                <a href="{{ route('booking', ['service' => $service->id]) }}" class="services-one__btn">Book Now</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--Services-->
  <!--latest-->
  <section class="services-page" style="padding: 50px 0 90px">
    <div class="container">
      <div class="section-title text-center">
        <h2 class="section-title__title">Services</h2>
      </div>
      <br />
      <br />
      <div class="row mt-5 justify-content-center">
        @foreach ($services as $item)
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
            <!--Services One Single-->
            <div class="services-one__single">
              <div class="services-one__img-box">
                <div class="services-one__img">
                  <img src="{{ asset($item->image_url) }}" alt="">
                </div>
              </div>
              <div class="services-one__content">
                <h3 class="services-one__title"><a
                    href="{{ route('service', ['service' => $item->id]) }}">{{ $item->name }}</a>
                </h3>
                {{-- <p class="services-one__text">{{ Str::limit($item->description, 50, '...') }}</p> --}}
                {{-- <p class="services-one__text" style="font-weight: bold">${{ $item->price }}</p> --}}
                <div class="services-one__bottom">
                  <a href="{{ route('booking', ['service' => $item->id]) }}" class="services-one__btn">Book Now</a>
                  <a href="{{ route('service', ['service' => $item->id]) }}" class="services-one__arrow"><span
                      class="icon-right-arrow"></span></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>
  <!--latest-->
</div>

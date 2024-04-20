
<div id="service-block" class="services-block style-one">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('webassests/images/element/circle-helf1.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            @php
                $service = $services->first()
            @endphp
            @if($service)
                <div class="col-lg-4">
                    <div class="text-feature-block md-mrb-55">
                        <h2 class="">
                            {{ $service->name }}
                        </h2>
                        <div class="sub-title col-md-12">

                            {{ $service->description }}
                        </div>
                        <a class="btn btn-default" href="{{ route('service', ['service' => $service->id]) }}">Read More</a>
                    </div>
                </div>
            @endif
            @if ($services->count() > 1)
                <div class="col-lg-8">
                    <div class="row service-items-area">
                        @foreach ($services as $service)
                            @if ($loop->iteration == 2) @continue @endif
                            <div class="col-lg-6 col-md-6">
                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="{{ asset($service->image_url) }}" alt="Icon" />
                                    </div>
                                    <div class="service-info">
                                        <h3 class="title">{{ $service->name }}</h3>
                                        <!-- <p>{{ \Str::limit($service->description, 50, "...") }}</p> -->
                                        <a class="read-more-text" href="{{ route('service', ['service' => $service->id]) }}">
                                            Learn More
                                            <i class="icofont-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- /.container -->
</div>

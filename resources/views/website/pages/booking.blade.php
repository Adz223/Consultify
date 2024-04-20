@extends('website.layout.master')
@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('./web2assets/images/Consult.jpg') }})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Book Consultation</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Book Consultation</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <section class="testimonial-one" style="padding: 52px 0 65px;">
        <div class="testimonial-one-map"
            style="background-image: url({{ asset('./web3assets/images/shapes/testimonial-one-map.png') }})"></div>
        <div class="container-fluid">
            <div class="row m-4">
                <div class="col-lg-6 col-md-6">
                    <h1 class="case-one__title">Select a Date and Time</h1>
                    <br />
                    <div class="case-one__single">
                        <div id="calendar"> </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="service-item">
                        <p>16 Dec, 2022</p>
                        <div class="row">
                            <button class='btn btn-danger text-white btn-block col-lg-8' type="button">12:00 AM - 12:30
                                AM</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="service-item">
                        <p>Click Here to Book a Consultation for your self</p>
                        <div class="row">
                            <button class='btn btn-primary text-white btn-block col-lg-12' type="button">Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-page">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h2 class="section-title__title">Consultation Booking</h2>
            </div>
            <div class="row m-4">
                <div class="col-xl-12">
                    <div class="contact-page__form">
                        <form class="comment-one__form contact-form-validated">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <label for="Your Name">Your Name</label>
                                        <input type="text" placeholder="Your Name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <label for="Email Address">Email Address</label>
                                        <input type="email" placeholder="Email Address" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <label for="Phone Number">Phone Number</label>
                                        <input type="text" placeholder="Phone Number" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <label for="Date">Date</label>
                                        <input type="Date" name="date">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <label for="Slot">Slot</label>
                                        <input type="text" name="date" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-xl-9"></div>
                                <div class="col-xl-3">
                                    <button type="submit" class="thm-btn comment-form__btn d-flex justify-content-end">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: false,
            eventClick: function(arg) {
                // opens events in a popup window
                const event = arg.event.toPlainObject({
                    'collapseExtendedProps': true
                });
            },
        });

        calendar.render();
    </script>
@endpush

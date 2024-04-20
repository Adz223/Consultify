<div id="service-block" x-data="booking" class="services-block style-one">
  <style>
    .usaImage41 {
      position: absolute;
      top: 52px;
      left: 16px;
      bottom: 0;
    }
  </style>
  <div class="container-fluid">
    <!--Page Header End-->
    <section class="testimonial-one" x-show="step==1" style="padding: 20px 0 65px;">

      <div class="testimonial-one-map"
        style="background-image: url({{ asset('./web3assets/images/shapes/testimonial-one-map.png') }})"></div>
      <div class="container-fluid">

        <div class="row m-4">
          <div class="alert alert-success" role="alert" @if (!$msg) style="display:none" @endif
            wire:ignore>
            <strong>Success!</strong> {{ $msg }}
          </div>
          <div class="alert alert-danger" role="alert" @if (!$errorMsg) style="display:none" @endif
            wire:ignore>
            <strong>Error!</strong> {{ $errorMsg }}
          </div>
          <div class="col-lg-7 col-md-7">
            <h1 class="case-one__title">Select a Date and Time</h1>
            <br />
            <div class="case-one__single" wire:ignore>
              <div id="calendar" wire:ignore></div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 mx-2">
            @if (!empty($slots))
              <div class="service-item">
                <p>{{ \Carbon\Carbon::parse($dates[$date]['date'])->format('j M, Y') }}</p>
                <div class="row">
                  @php
                    $items = collect($slots);
                  @endphp
                  @foreach ($wholeSlots as $item)
                    @php
                      $slot1 = explode(' - ', $item['consultation_slot_time'])[0];
                      $slot2 = explode(' - ', $item['another_consultation_slot_time'])[0];
                      $check = $items->firstWhere('id', $item['id']);
                    @endphp
                    @if (!$check)
                      <button class='btn mb-1 btn-danger d-none text-white btn-block col-12' type="button"
                        wire:click.prevent="selectSlot('')">
                        {{ $item['consultation_slot_time'] }}
                      </button>
                      <button class='btn mb-1 btn-danger d-none text-white btn-block col-12' type="button"
                        wire:click.prevent="selectSlot('')">
                        {{ $item['another_consultation_slot_time'] }}
                      </button>
                    @else
                      {{-- @if (isset($check['bookings'])) @dd($check['bookings'][0]['slot']) @endif --}}
                      @if (
                          !isset($check['bookings']) ||
                              empty($check['bookings']) ||
                              \Carbon\Carbon::parse($check['bookings'][0]['slot'])->diffInMinutes($slot1) > 0)
                        <button @class([
                            'btn mb-1 btn-primary text-white btn-block col-12',
                            'active' => $slot == $slot1,
                        ]) type="button"
                          wire:click.prevent="selectSlot('{{ $slot1 }}')">
                          {{ $item['consultation_slot_time'] }}
                        </button>
                      @else
                        <button class='btn mb-1 btn-danger d-none text-white btn-block col-12' type="button"
                          wire:click.prevent="selectSlot('')">
                          {{ $item['consultation_slot_time'] }}
                        </button>
                      @endif
                      @if (
                          !isset($check['bookings']) ||
                              empty($check['bookings']) ||
                              \Carbon\Carbon::parse($check['bookings'][0]['slot'])->diffInMinutes($slot2) > 0)
                        <button @class([
                            'btn mb-1 btn-primary text-white btn-block col-lg-12',
                            'active' => $slot == $slot2,
                        ]) type="button"
                          wire:click.prevent="selectSlot('{{ $slot2 }}')">
                          {{ $item['another_consultation_slot_time'] }}
                        </button>
                      @else
                        <button class='btn mb-1 btn-danger d-none text-white btn-block col-lg-8' type="button"
                          wire:click.prevent="selectSlot('')">
                          {{ $item['another_consultation_slot_time'] }}
                        </button>
                      @endif
                    @endif
                  @endforeach
                </div>
              </div>
            @endif
          </div>
          <div class="col-lg-3 col-md-3">
            @if (!empty($date) && !empty($slot))
              <div class="service-item">
                <p>Click Here to Book a Free Consultation.</p>
                <div class="row">
                  <button class="btn btn-block btn-dark text-white col-12" type="button"
                    wire:click.prevent="changeStep">
                    Book
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    <section class="contact-page" x-show="step==2">
      @if ($errorMsg)
        <div class="col-12">
          <div class="alert alert-danger" role="alert">
            <strong>Error!</strong> {{ $errorMsg }}
          </div>
        </div>
      @endif
      <div class="container-fluid">
        <div class="section-title text-center">
          <h2 class="section-title__title">Consultation Booking</h2>
        </div>
        <div class="row m-4">
          <div class="col-xl-12" x-show="!isPayment">
            <div class="contact-page__form">
              <form wire:submit.prevent='book' class="comment-one__form">
                <div class="row">
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="First Name">First Name</label>
                      <input type="text" placeholder="First Name" wire:model.lazy="firstname">
                      @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="Last Name">Last Name</label>
                      <input type="text" placeholder="Last Name" wire:model.lazy="lastname">
                      @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="Email Address">Email Address</label>
                      <input type="email" placeholder="Email Address" wire:model.lazy="email">
                      @error('email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6 position-relative" wire:ignore>
                    <div class="comment-form__input-box">
                      <label for="Phone Number">Phone Number</label>
                      <input type="text" class="form-control w-100" id="phone" wire:model.lazy="contact">
                      @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- /<img src="/assets/img/usa.png" class="usaImage41" width="40px" alt=""> --}}
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box" wire:ignore>
                      <label for="Phone Number">Country of Residence</label>
                      <select placeholder="Country Of Residence" wire:model.lazy="country" id="address-country">
                        <option>Select Country</option>
                      </select>
                      @error('country')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="date">Date</label>
                      <input type="text" value="{{ collect($dates)->where('id', $date)->value('date') }}" disabled>
                      @error('date')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="Slot">Slot</label>
                      <input type="text" wire:model.lazy="slot" disabled>
                      @error('slot')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row d-flex justify-content-end">
                  <div class="col-xl-9"></div>
                  <div class="col-xl-3">
                    <div class="col-lg-12 mrt-15 text-right">
                      <a href="{{ route('home') }}" class="btn btn-primary px-5 py-3 text-white">Go
                        Back</a>
                      <button type="button" class="btn btn-primary px-5 py-3 text-white d-none"
                        wire:loading.class.remove="d-none">
                        <svg class="icon-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path
                            d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                        </svg>
                      </button>
                      <button type="submit" class="btn btn-primary px-5 py-3 text-white"
                        wire:loading.class="d-none">
                        Next
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-xl-12 text-center" x-show="isPayment">

            <div class="contact-page__form">
              <form wire:submit.prevent='book' class="comment-one__form">
                <div class="row mx-12">
                  <div class="col-lg-12 col-md-12">
                    <div class="comment-form__input-box">
                      <label>Card Number</label>
                      <input type="number" wire:model.lazy="card_number" placeholder="xxxxxxxxxxxxxxxx">
                      @error('card_number')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="comment-form__input-box">
                      <label>Expiry Month</label>
                      <input type="month" wire:model.lazy="expiry_month" placeholder="2022-12">
                      @error('expiry_month')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="comment-form__input-box">
                      <label>CVC</label>
                      <input type="number" wire:model.lazy="cvc" placeholder="123">
                      @error('cvc')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 text-right d-flex justify-content-end">
                    <button type="button" class="btn btn-primary px-5 py-3 text-white d-none"
                      wire:loading.class.remove="d-none">
                      <svg class="icon-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                          d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                      </svg>
                    </button>
                    <button type="submit" class="btn btn-primary px-5 py-3 text-white" wire:loading.class="d-none">
                      Book
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@push('styles')
  <style>
    svg.icon-spinner {
      fill: white;
      width: 20px;
    }

    .iti {
      width: 100%;
    }

    .fc-daygrid-day-events {
      position: absolute !important;
      top: 4px !important;
      width: 100%;
    }

    .fc-daygrid-event.fc-daygrid-block-event {
      width: 25%;
      height: 19px;
      border-radius: 50%;
      border: 0 !important;
    }
  </style>
@endpush
@push('scripts')

  <script>
    var input = document.querySelector("#phone");


    //    const iti =  intlTelInput(input, {
    //     //   initialCountry: "auto",
    //       utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
    //       nationalMode: false,
    //       formatOnDisplay: true,
    //       geoIpLookup: function (success, failure) {
    //         $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
    //           var countryCode = (resp && resp.country) ? resp.country : "us";
    //           success(countryCode);
    //         });

    //       },
    //     });
    var iti = window.intlTelInput(input, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
      // initialCountry: "auto",
      geoIpLookup: function(success, failure) {
        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          success(countryCode);
        });
      },
      //   nationalMode: false,
      formatOnDisplay: true // SET THIS!!!
    });

    input.addEventListener('keyup', formatIntlTelInput);
    input.addEventListener('change', formatIntlTelInput);

    function formatIntlTelInput() {
      console.log(intlTelInputUtils)
      if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
        var currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
        if (typeof currentText === 'string') { // sometimes the currentText is an object :)
          iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
        }
      }
    }
    var countryData = window.intlTelInputGlobals.getCountryData(),
      addressDropdown = document.querySelector("#address-country");
    for (var i = 0; i < countryData.length; i++) {
      var country = countryData[i];
      var optionNode = document.createElement("option");
      optionNode.value = country.iso2;
      var textNode = document.createTextNode(country.name);
      optionNode.appendChild(textNode);
      addressDropdown.appendChild(optionNode);
    }
    addressDropdown.value = 'us';
    console.log(iti.getSelectedCountryData().iso2)
  </script>
@endpush
@push('scripts')
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.sent', (message, component) => {
        $(".consultation_loader").show()
      })
      Livewire.hook('message.processed', (message, component) => {
        $(".consultation_loader").fadeOut('slow')
      })
    });
    document.addEventListener('alpine:init', () => {
      Alpine.data('booking', () => ({
        calendar: null,
        currentMonth: @entangle('currentMonth'),
        currentYear: @entangle('currentYear'),
        isPayment: @entangle('isPayment'),
        events: @entangle('events'),
        step: @entangle('step'),
        init() {
          var calendarEl = document.getElementById('calendar');
          // this.$watch('isPayment', bool => {
          //   if (bool) this.paypal();
          // })
          this.$watch('events', events => {
            this.calendar.getEvents().forEach(event => event.remove())
            events.forEach(event => this.calendar.addEvent(event));
            this.calendar.render();
            $(".consultation_loader").fadeOut("slow")
          })
          const wire = this.$wire
          const _this = this
          this.calendar = new FullCalendar.Calendar(calendarEl, {
            dayHeaderFormat: { weekday: 'long' },
            initialView: 'dayGridMonth',
            selectable: false,
            // plugins: [ dayGridPlugin, interactionPlugin ],
            datesSet: event => {
              // console.log("event ==> ", new Date((event.start.getTime() + event.end.getTime()) / 2).getMonth())
              // As the calendar starts from prev month and end in next month I take the day between the range
              var midDate = new Date((event.start.getTime() + event.end
                .getTime()) / 2)
              var month = `0${ midDate.getMonth() + 1 }`
              var year = midDate.getFullYear();
              if (month.length = 3) month = month.slice(1)
              if (month != _this.month || year != _this.currentYear) wire
                .getMonthData(month, year)
            },
            dateClick: info => {
              const ele = $(info.dayEl).find(
                "a.fc-daygrid-event.fc-daygrid-block-event.fc-h-event.fc-event.fc-event-start.fc-event-end"
              )
              if (ele) ele[0].click()
            },
            eventClick: function(arg) {
              // opens events in a popup window
              const event = arg.event.toPlainObject({
                'collapseExtendedProps': true
              });
              // wire.slot = "";
              if (event.is_available) {
                wire.date = event.id;
              } else wire.date = '';
              arg.jsEvent.preventDefault() // don't navigate in main tab
            },
            events: this.events
          });

          this.calendar.render();
        }
      }))
    })
  </script>
@endpush

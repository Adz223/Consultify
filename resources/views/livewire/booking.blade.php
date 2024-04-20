<div id="service-block" x-data="booking" class="services-block style-one">
  <div class="container-fluid">
    <!--Page Header End-->
    {{-- @if ($msg)
      <div class="col-12">
        <div class="alert alert-success" role="alert">
          <strong>Success!</strong> {{ $msg }}
        </div>
      </div>
    @endif
    @if ($errorMsg)
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
          <strong>Error!</strong> {{ $errorMsg }}
        </div>
      </div>
    @endif --}}
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
          <div class="col-lg-5 offset-lg-1 col-md-6">
            <h1 class="case-one__title">Select a Date and Time</h1>
            {{-- @dd($msg, 2) --}}
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
                    @if (!$items->firstWhere('id', $item['id']))
                      <button class='btn mb-1 btn-danger d-none text-white btn-block col-12' type="button"
                        wire:click.prevent="selectSlot('')">
                        {{ $item['service_slot_time'] }}
                      </button>
                    @else
                      <button @class([
                          'btn mb-1 btn-primary text-white btn-block col-12',
                          'active' => $slot == $item['id'],
                      ]) type="button"
                        wire:click.prevent="selectSlot('{{ $item['id'] }}')">
                        {{ $item['service_slot_time'] }}
                      </button>
                    @endif
                  @endforeach
                </div>
              </div>
            @endif
          </div>
          <div class="col-lg-3 col-md-3">
            @if (!empty($date) && !empty($slot))
              <div class="service-item">
                <p>Click Here to Book Your Free Consultation.</p>
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
      <div class="container-fluid">
        <div class="section-title text-center">
          <h2 class="section-title__title">Consultation Booking</h2>
        </div>
        <div class="row m-4">
          <div class="col-xl-12" x-show="!isPayment">
            <div class="contact-page__form">
              <form wire:submit.prevent='checkBookingDetails' class="comment-one__form">
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
                      <input type="text"
                        value="{{ collect($slots)->where('id', $slot)->value('service_slot_time') }}" disabled>
                      @error('slot')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="comment-form__input-box">
                      <label for="Currency">Currency</label>
                      <select wire:model="currency">
                        <option value="GBP">Great British Pound</option>
                        <option value="EUR">Euro</option>
                        <option value="MAD">Moroccan Dirham</option>
                      </select>
                      @error('currency')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row d-flex justify-content-end">
                  {{-- <div class="col-xl-9"></div> --}}
                  <div class="row">
                    <div class="col-lg-9 mrt-15 text-right">
                      <a href="{{ route('home') }}" class="btn btn-primary px-5 py-3 text-white">Go
                        Back</a>
                    </div>
                    <div class="col-lg-3 mrt-15 text-right">

                      <button type="button" class="btn btn-primary px-5 py-3 text-white d-none"
                        wire:loading.class.remove="d-none">
                        <svg class="icon-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path
                            d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                        </svg>
                      </button>
                      <button type="submit" class="btn btn-primary px-5 py-3 text-white"
                        wire:loading.class="d-none">
                        Pay {{ $service->getPrice($currency) }}
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-xl-12 text-center" x-show="isPayment">

            @if (!empty($date) && !empty($slot))
              <div class="row mb-3">
                <table class="col-6 offset-3">
                  <tr>
                    <td style="text-align: right">
                      <h3><b>Date:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ \Carbon\Carbon::parse($dates[$date]['date'])->format('j M, Y') }}
                        ({{ collect($wholeSlots)->firstWhere('id', $slot)['service_slot_time'] }})</h3>
                    </td>
                  </tr>
                  @if ($summary)
                    <tr>
                      <td style="text-align: right">
                        <h3><b>Summary:</b></h3>
                      </td>
                      <td style="text-align: left">
                        <h3>{{ $summary }}</h3>
                      </td>
                    </tr>
                  @endif
                  <tr>
                    <td style="text-align: right">
                      <h3><b>First Name:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ $firstname }}</h3>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right">
                      <h3><b>Last Name:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ $lastname }}</h3>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right">
                      <h3><b>Email:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ $email }}</h3>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right">
                      <h3><b>Contact:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ $contact }}</h3>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right">
                      <h3><b>Country:</b></h3>
                    </td>
                    <td style="text-align: left">
                      <h3>{{ $country }}</h3>
                    </td>
                  </tr>
                </table>
              </div>
            @endif
            <div class="contact-page__form">

              {{-- <div id="paypal-button-container"></div> --}}
              @if ($isPayment && $checkout)
                <a class="btn w-100 btn-primary btn-block mx-auto rounded-pill" href="{{ $checkout->url }}"
                  role="button" style="max-width: 750px; max-height: 40px; padding: 5px 0 5px;">
                  Pay With <img src="{{ asset('assets/img/5842a8e9a6515b1e0ad75b01.png') }}" width="55">
                </a>
              @endif
              {{-- <div class="col-lg-12 col-md-12 text-right d-flex justify-content-end">
                <button type="button" class="btn btn-primary px-5 py-3 text-white d-none"
                  wire:loading.class.remove="d-none">
                  <svg class="icon-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                      d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                  </svg>
                </button>
                <button type="submit" class="btn btn-primary px-5 py-3 text-white" wire:loading.class="d-none">
                  Pay {{ $service->getPrice($currency) }}
                </button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@push('styles')
  <style>
    .iti {
      width: 100%;
    }

    svg.icon-spinner {
      fill: white;
      width: 20px;
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
  <!-- Sample PayPal credentials (client-id) are included -->
  {{-- <script src="https://www.paypal.com/sdk/js?client-id=test&currency={{ $currency }}&intent=capture"
    data-sdk-integration-source="integrationbuilder"></script> --}}
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
        currency: @entangle('currency'),
        init() {
          //   const price = {
          //     USD: {{ $service->price }},
          //     EUR: {{ $service->eur_price }},
          //     MAD: {{ $service->mad_price }},
          //   }
          //   this.paypal(price[this.currency])
          //   this.$watch('isPayment', bool => {
          //     if (bool) this.paypal(price[this.currency]);
          //   })
          this.$watch('events', events => {
            this.calendar.getEvents().forEach(event => event.remove())
            events.forEach(event => this.calendar.addEvent(event));
            this.calendar.render();
            $(".consultation_loader").fadeOut("slow")
          })
          const _this = this
          console.log("this ==> ", _this.$wire.__instance)
          const wire = this.$wire
          var calendarEl = document.getElementById('calendar');
          this.calendar = new FullCalendar.Calendar(calendarEl, {
            dayHeaderFormat: { weekday: 'long' },
            initialView: 'dayGridMonth',
            selectable: false,
            datesSet: event => {
              // console.log("event ==> ", new Date((event.start.getTime() + event.end.getTime()) / 2).getMonth())
              // As the calendar starts from prev month and end in next month I take the day between the range
              var midDate = new Date((event.start.getTime() + event.end
                .getTime()) / 2)
              var month = `0${ midDate.getMonth() + 1 }`
              var year = midDate.getFullYear();
              if (month.length = 3) month = month.slice(1)
              if (month != _this.month || year != _this.currentYear) wire.getMonthData(month, year)
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
              wire.slot = "";
              if (event.is_available) {
                wire.date = event.id;
              } else wire.slots = [];
              arg.jsEvent.preventDefault() // don't navigate in main tab
            },
            events: this.events
          });

          this.calendar.render();

        }
        /*,
        paypal(amount) {
          const component = this.$wire
          const fundingSources = [
            paypal.FUNDING.PAYPAL
            // paypal.FUNDING.CARD
          ]

          for (const fundingSource of fundingSources) {
            const paypalButtonsComponent = paypal.Buttons({
              fundingSource: fundingSource,

              // optional styling for buttons
              // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
              style: {
                shape: 'pill',
                height: 40,
              },

              // set up the transaction
              createOrder: (data, actions) => {
                // pass in any options from the v2 orders create call:
                // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                console.log({
                  currency_code: this.currency,
                  value: amount
                })
                const createOrderPayload = {
                  purchase_units: [{
                    amount: {
                      currency_code: this.currency,
                      value: amount
                    },
                  }],
                }

                return actions.order.create(createOrderPayload)
              },

              // finalize the transaction
              onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                  const payerName = details.payer.name.given_name
                  console.log('Transaction completed!');
                  component.book(JSON.stringify(details))
                }

                return actions.order.capture().then(captureOrderHandler)
              },

              // handle unrecoverable errors
              onError: (err) => {
                console.error(
                  'An error prevented the buyer from checking out with PayPal'
                )
                //   alert("Error Accured! Please try later");
              },
            })

            if (paypalButtonsComponent.isEligible()) {
              paypalButtonsComponent
                .render('#paypal-button-container')
                .catch((err) => {
                  console.error('PayPal Buttons failed to render')
                })
            } else {
              console.log('The funding source is ineligible')
            }
          }
        }
        */
      }))
    })
  </script>
@endpush

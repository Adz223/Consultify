<div id="service-block" x-data="booking" class="services-block style-one">
  <div class="container">
    <div class="row" x-show="step==1">
      <div class="col-lg-6 col-md-6">
        <h2>
          <strong class='text-underline'>
            Select a Date and Time
          </strong>
        </h2>
      </div>
      <div class="col-lg-3 col-md-3">
        <h2>

        </h2>
      </div>
      <div class="col-lg-3 col-md-3">
        <h2>
          <strong>
            Booking Summary
          </strong>
        </h2>
      </div>
    </div>
    <div class="row" x-show="step==1">
      <div class="col-lg-6 col-md-6">
        <div class="service-item" wire:ignore>
          <div id="calendar"> </div>
        </div>
      </div>
      @if (!empty($slots))
        <div class="col-lg-3 col-md-3">
          <div class="service-item">
            <p>{{ \Carbon\Carbon::parse($dates[$date]['date'])->format('j M, Y') }}</p>
            <div class="row">
              @php
                $items = collect($slots);
              @endphp
              @foreach ($wholeSlots as $item)
                @if (!$items->firstWhere('id', $item['id']))
                  <button class='btn btn-danger text-white btn-block col-12' type="button"
                    wire:click.prevent="selectSlot('')">
                    {{ $item['service_slot_time'] }}
                  </button>
                @else
                  <button @class([
                      'btn btn-dark text-white btn-block col-12',
                      'active' => $slot == $item['id'],
                  ]) type="button"
                    wire:click.prevent="selectSlot('{{ $item['id'] }}')">
                    {{ $item['service_slot_time'] }}
                  </button>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      @else
        <div class="col-lg-3 col-md-3"></div>
      @endif
      <div class="col-lg-3 col-md-3">
        <div class="service-item">
          <p>Click Here to Book a Service for your self</p>
          <p>$ {{ $service->price }}</p>
          @if (!empty($date) && !empty($slot))
            <button class="btn btn-block btn-dark text-white" type="button" wire:click.prevent="changeStep">
              Book
            </button>
          @endif
        </div>
      </div>
    </div>
    <div class="row" x-show="step==2">
      <div class="col-lg-12 col-md-12">
        <div class="service-item">
          <div class="service-icon">
            <img src="{{ asset('webassests/images/icon/services/1/1.png') }}" alt="Icon" />
          </div>
          <div class="service-info mb-3">
            <h3 class="title">{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
            <h3 class="title"> <b>{{ $currency }} {{ $service->getPrice($currency) }}</b> </h3>
          </div>
          <hr />
          @if ($msg)
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
          @endif
          <div x-show="!isPayment" class="contact-form-area">
            <form wire:submit.prevent='checkBookingDetails'>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="name">Your Name</label>
                    <input class="form-controller" wire:model.lazy="name" type="text">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- col-lg-6-->
                <!-- col-lg-6-->
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="contact">Contact #</label>
                    <input class="form-controller" wire:model.lazy="contact" type="number">
                    @error('contact')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- col-lg-6 -->
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-controller" wire:model.lazy="email" type="email">
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- col-lg-6 -->
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label for="date">Date</label>
                    <select class="form-controller" wire:model.lazy="date" disabled>
                      <option value="">Please select an option</option>
                      @foreach ($dates as $item)
                        <option value="{{ $item['id'] }}">{{ $item['date'] }}</option>
                      @endforeach
                    </select>
                    @error('date')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <!-- col-lg-6 -->
                @if (!empty($slots))
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for="date">Slot</label>
                      <select class="form-controller" wire:model.lazy="slot" disabled>
                        <option value="">Please select an option</option>
                        @foreach ($slots as $item)
                          <option value="{{ $item['id'] }}">
                            {{ $item['service_slot_time'] }}
                          </option>
                        @endforeach
                      </select>
                      @error('slot')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                @endif
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label>Currency</label>
                    <select class="form-controller d-none" wire:model="currency" >
                      <option value="USD">UNITED STATE DOLLAR - USD</option>
                      <option value="GBP">Great British Pound - GBP</option>
                      <option value="EUR">EURO - EUR</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 mrt-15 text-right">
                  <a href="{{ route('service', ['service' => $service->id]) }}" class="btn btn-dark text-white">Go
                    Back</a>
                  <button type="button" class="btn btn-dark text-white d-none" wire:loading.class.remove="d-none">
                    <svg class="icon-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path
                        d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z" />
                    </svg>
                  </button>
                  <button type="submit" class="btn btn-dark text-white" wire:loading.class="d-none">
                    Pay {{ $service->getPrice($currency) }}
                  </button>
                </div>
                <!-- col-lg-6 -->
              </div><!-- /.row -->
            </form><!-- /.contact-form -->
          </div><!-- /.contact-form-area -->
          <div class="row-col text-center" x-show="isPayment" style="position: sticky;">
            {{-- @if ($isPayment) --}}
              <div id="paypal-button-container"></div>
              <!-- Sample PayPal credentials (client-id) are included -->
              <script src="https://www.paypal.com/sdk/js?client-id=test&currency={{ $currency }}&intent=capture"
                data-sdk-integration-source="integrationbuilder"></script>
            {{-- @endif --}}
          </div>
        </div>
        <!-- col-lg-6 -->
      </div><!-- /.row -->
      </form><!-- /.contact-form -->
    </div><!-- /.contact-form-area -->
  </div>
</div>
@push('styles')
  <style>
    svg.icon-spinner {
      fill: white;
      width: 20px;
    }
  </style>
@endpush
@push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('booking', () => ({
        isPayment: @entangle('isPayment'),
        events: @entangle('events'),
        step: @entangle('step'),
        currency: @entangle('currency'),
        init() {
          const price = {
            GBP: {{ $service->price }},
            EUR: {{ $service->eur_price }},
            MAD: {{ $service->mad_price }},
          }
          this.$watch('isPayment', bool => {
            if (bool) setTimeout(() => this.paypal(price[this.currency]), 1200);
          })
          const wire = this.$wire
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: false,
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

          calendar.render();

        },
        paypal(amount) {
          const component = this.$wire
          const fundingSources = [
            paypal.FUNDING.PAYPAL,
            paypal.FUNDING.CARD
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
      }))
    })
  </script>
@endpush

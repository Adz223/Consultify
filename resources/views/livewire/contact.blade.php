<section class="contact-one" style="padding-bottom: 52px;">
  <style>
    .contact-one__bottom-points li .icon {
      position: relative;
      height: 24px;
      width: 25px;
      background-color: var(--conult-base);
      border-radius: 50%;
      font-size: 16px;
      color: var(--conult-white);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .usaImage40 {
      position: absolute;
      top: 24px;
      left: 8px;
      bottom: 0;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6">
        <div class="contact-one__left">
          <div class="section-title text-left">
            {{-- <span class="section-title__tagline">Contact with us</span>
                                <h2 class="section-title__title">Contact Experts</h2> --}}
          </div>
          <p class="contact-one__text text-wrap get-to-know__text fs-5 fw-normal" style="font-family: Hoefler;text-align: justify">As the founder of Consultify, I am delighted to share our
            story with you. Consultify was born in the vibrant city of Nashville, Tennessee, where we take
            great pride in serving our local community. We believe in the power of education to transform lives, and our
            mission is to facilitate educational partnerships that transcend borders and create boundless opportunities
            for students.</p>
          <p class="contact-one__text text-wrap get-to-know__text fs-5 fw-normal" style="font-family: Hoefler;text-align: justify">While our roots may lie in Nashville, our vision extends far beyond. We
            are dedicated to serving not only the local community but also communities across the United States and
            beyond. We understand the importance of global collaboration and recognize the immense value it brings to
            educational institutions and students alike.</p>
          <h2 class="contact-one__founder">Consultify <span>- PROUDLY FOUNDED IN TENNESSEE.</span></h2>
          <div class="contact-one__bottom">
            <div class="contact-one__bottom-img">
              <img src="{{ asset('./web2assets/bright/contact us/Untitled-7 copy.jpg') }}" alt="">
            </div>
            <ul class="list-unstyled contact-one__bottom-points">
              <li>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="text">
                  <p>info@brightconsultingroup.com</p>
                </div>
              </li>
              {{-- <li>
                <div class="icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <div class="text">
                  <p>504 4th Avenue South. Nashville, TN 37210</p>
                </div>
              </li> --}}
              <li>
                <div class="icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="text">
                  <p>+1 615-200-0288</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6">
        <h2 class="section-title__title fw-bold fs-4">Contact Us </h2>
        <div class="contact-one__right">
          <div class="contact-one__form-box">
            @if ($msg)
              <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ $msg }}
              </div>
            @endif
            <form wire:submit.prevent='sendContactDetails' class="contact-one__form contact-form-validated">
              <div class="row">
                <div class="col-xl-6">
                  <div class="contact-one__input-box">
                    <input type="text" placeholder="First Name" wire:model.lazy="firstname">
                    @error('firstname')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="contact-one__input-box">
                    <input type="email" placeholder="Email Address" wire:model.lazy="email">
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="contact-one__input-box">
                    <input type="text" placeholder="Last Name" wire:model.lazy="lastname">
                    @error('lastname')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xl-6 position-relative" wire:ignore>
                  <div class="contact-one__input-box">
                    <input type="text" id="phone" placeholder="" wire:model.lazy="contact">
                    @error('contact')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>


                </div>
                <div class="col-xl-6">
                  <div class="comment-form__input-box" wire:ignore>
                    {{-- <label for="Phone Number">Country of Residence</label> --}}
                    <select type="text" placeholder="Country Of Residence" wire:model.lazy="country"
                      id="address-country">
                      <option class="selectDEv">Select Country</option>
                    </select>
                    @error('country')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="contact-one__input-box">
                    <input type="text" placeholder="Subject" wire:model.lazy="subject">
                    @error('subject')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-12">
                  <div class="contact-one__input-box">
                    <textarea wire:model.lazy="message" placeholder="Write a Message"></textarea>
                    @error('message')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button type="submit" class="thm-btn contact-one__btn">send a message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('header')
  @if ($allowMap)
    <section class="contact-page-google-map">
      <div class="container">
        {{-- <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3221.4444312426153!2d-86.77543108537999!3d36.15573831141072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8864665d6bcefa1f%3A0xfdedcf5f3c7047cd!2s504%204th%20Ave%20S%2C%20Nashville%2C%20TN%2037210%2C%20USA!5e0!3m2!1sen!2s!4v1677850121344!5m2!1sen!2s"
          class="contact-page-google-map__one" allowfullscreen>

        </iframe> --}}
      </div>
    </section>
  @endif
@endpush
@push('script')
  <script>
    var input = document.querySelector("#phone");

    Livewire.on("reInitFields", () => {

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
      addressDropdown.value = iti.getSelectedCountryData().iso2;
    })
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
    addressDropdown.value = iti.getSelectedCountryData().iso2;
  </script>
@endpush

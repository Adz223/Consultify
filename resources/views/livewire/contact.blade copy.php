   <div id="contact-block" class="contact-form-block style-two pd-b-130 pt-5">
       <div class="element-group">
           <div class="element one">
               <img src="{{ asset('webassests/images/element/triangle1.png') }}" alt="Element">
           </div>
           <div class="element two">
               <img src="{{ asset('webassests/images/element/circle3.png') }}" alt="Element">
           </div>
       </div>
       <div class="container ml-b-40">
           <div class="row">
               <div class="col-lg-5 col-md-6">
                   <div class="section-title">
                       <h2 class="">
                           CAN WE BUILD ANYTHING FOR YOU?
                       </h2>
                       <p>
                           Are you interested in finding out more about how we help improve business outcomes for your
                           organisation? Just call us or fill out the form below.
                       </p>
                       <!-- /.title-main -->
                   </div>
                   <!-- /.section-title -->
               </div>
               <!-- /.col-lg-5 -->
           </div>
           <!-- /.row -->
           <div class="row align-items-center">
               <div class="col-lg-6">
                   <div class="google-map md-mrb-50">
                       <img src="{{ asset('webassests/images/others/google-map.png') }}" alt="Map">
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="contact-form-area">
                       <form wire:submit.prevent="sendContactDetails">
                           <div class="row">
                               <div class="col-lg-6 col-md-6">
                                   <div class="form-group">
                                       <label for="name">Your Name</label>
                                       <input class="form-controller" wire:model.lazy="name" type="text">
                                   </div>
                               </div>
                               <!-- col-lg-6-->
                               <!-- col-lg-6-->
                               <div class="col-lg-6 col-md-6">
                                   <div class="form-group">
                                       <label for="contact">Contact #</label>
                                       <input class="form-controller" wire:model.lazy="contact" type="number">
                                   </div>
                               </div>
                               <!-- col-lg-6 -->
                               <div class="col-lg-12 col-md-12">
                                   <div class="form-group">
                                       <label for="email">Your Email</label>
                                       <input class="form-controller" wire:model.lazy="email" type="email">
                                   </div>
                               </div>
                               <!-- col-lg-12 -->
                               <div class="col-12">
                                   <div class="form-group">
                                       <label for="name">Your Message</label>
                                       <textarea wire:model.lazy="message" class="form-controller" rows="4" cols="50"></textarea>
                                   </div>
                               </div><!-- /.col-12 -->
                               @if ($msg)
                                   <div class="col-12">
                                       <div class="alert alert-success" role="alert">
                                           <strong>Success!</strong> {{ $msg }}
                                       </div>
                                   </div>
                               @endif
                               <div class="col-12 mrt-15">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                               </div>
                               <!-- col-lg-6 -->
                           </div><!-- /.row -->
                       </form><!-- /.contact-form -->
                   </div><!-- /.contact-form-area -->
                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="single-contact-info">
                               <h3 class="title">Postal Address</h3>
                               <div class="card-info">
                                   <p>
                                       {{ "{$settings->address}, {$settings->city}" }}
                                       <br>
                                       {{ "{$settings->state}, {$settings->country}" }}
                                   </p>
                                   <div class="social-status">
                                       <a href="#"><i class="icofont-facebook"></i></a>
                                       <a href="#"><i class="icofont-twitter"></i></a>
                                       <a href="#"><i class="icofont-dribbble"></i></a>
                                       <a href="#"><i class="icofont-behance"></i></a>
                                       <a href="#"><i class="icofont-pinterest"></i></a>
                                   </div>
                               </div><!-- /.card-info -->
                           </div><!-- /.single-contact-info -->
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="single-contact-info">
                               <h3 class="title">Office Contacts</h3>
                               <div class="card-info">
                                   <ul class="info-list">
                                       <li>
                                           <i class="icofont-phone"></i>
                                           {{ $settings->contact }}
                                       </li>
                                       <li>
                                           <i class="icofont-send-mail"></i>
                                           <a href="mailto:{{ $settings->mail_email }}">{{ $settings->mail_email }}</a>
                                       </li>
                                       <li>
                                           <i class="icofont-globe-alt"></i>
                                           <a href="{{ route('home') }}">{{ route('home') }}</a>
                                       </li>
                                   </ul>
                               </div><!-- /.card-info -->
                           </div><!-- /.single-contact-info -->
                       </div>
                   </div>
               </div><!-- /.col-lg-6 -->
           </div><!-- /.row -->
       </div><!-- /.container -->
   </div>

<div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
    <div class="col-xxl-8 col-xl-10 col-lg-10">
        <form class="pt-3" wire:submit.prevent='signup'>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 mb-5">
                    <h2 class="text-gradient font-heading">Sign up your Account</h2>
                    {{-- <span class="text-muted">Amazing Features to make your life easier & work efficient.</span> --}}
                </li>
                <li class="col-6 pt-4">
                    <div class="mb-2">
                        <label class="form-label">First Name</label>
                        <input type="text" wire:model.lazy="first_name" class="form-control form-control-lg"  placeholder="First Name">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-6 pt-4">
                    <div class="mb-2">
                        <label class="form-label">Last Name</label>
                        <input type="text" wire:model.lazy="last_name" class="form-control form-control-lg"  placeholder="Last Name">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-6 pt-4">
                    <div class="mb-2">
                        <label class="form-label">Service</label>
                        <select wire:model.lazy="service" class="form-control form-control-lg">
                            <option value="">Please select a service</option>
                            @foreach ($services as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>    
                            @endforeach    
                        </select>
                        @error('service') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-6 pt-4">
                    <div class="mb-2">
                        <label class="form-label">Email address</label>
                        <input type="email" wire:model.lazy="email" class="form-control form-control-lg"  placeholder="name@example.com">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-6">
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <input type="password" wire:model.lazy="password" class="form-control form-control-lg"  placeholder="***************">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-6">
                    <div class="mb-2">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" wire:model.lazy="password_confirmation" class="form-control form-control-lg"  placeholder="***************">
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                {{-- <li class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="Rememberme">
                        <label class="form-check-label" for="Rememberme">Remember me</label>
                    </div>
                </li> --}}
                @if (session()->has('status'))
                    <li class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session()->get('status') }}
                        </div>
                    </li>
                @endif
                <li class="col-12 mt-4">
                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase px-5">SIGN UP</button>
                    <a class="btn btn-lg btn-block btn-dark lift text-uppercase px-5" href="{{ route('login') }}">SIGN IN</a>
                </li>
            </ul>
            <!--[ ul.row end ]-->
        </form>
    </div>
    <div class="col-xxl-4 col-xl-3 col-lg-12">
    </div>
</div>

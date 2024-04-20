<div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
    <div class="col-xxl-6 col-xl-7 col-lg-10">
        <form class="pt-3" wire:submit.prevent='login'>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 mb-5">
                    <h2 class="text-gradient font-heading">Sign in to your Account</h2>
                    <span class="text-muted">Amazing Features to make your life easier & work efficient.</span>
                </li>
                <li class="col-12 pt-4">
                    <div class="mb-2">
                        <label class="form-label">Email address</label>
                        <input type="email" wire:model.lazy="email" class="form-control form-control-lg"  placeholder="name@example.com">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                <li class="col-12">
                    <div class="mb-2">
                        <div class="form-label">
                            <span class="d-flex justify-content-between align-items-center"> Password
                                <a class="text-primary" href="{{ route('password.request') }}">Forgot Password?</a>
                            </span>
                        </div>
                        <input type="password" wire:model.lazy="password" class="form-control form-control-lg"  placeholder="***************">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
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
                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase px-5">SIGN IN</button>
                    <a class="btn btn-lg btn-block btn-dark lift text-uppercase px-5" href="{{ route('signup') }}">SIGN UP</a>
                </li>
            </ul>
            <!--[ ul.row end ]-->
        </form>
    </div>
    <div class="col-xxl-4 col-xl-3 col-lg-12">
    </div>
</div>

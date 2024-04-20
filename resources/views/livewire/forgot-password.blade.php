<div class="row g-xl-4 g-lg-3 g-2 justify-content-between">
    <div class="col-xxl-6 col-xl-7 col-lg-10">
        <form class="pt-3" wire:submit.prevent='forgotPassword'>
            <ul class="row g-3 list-unstyled li_animate">
                <li class="col-12 mb-5">
                    <h2 class="text-gradient font-heading">Forgot Password</h2>
                    {{-- <span class="text-muted">Amazing Features to make your life easier & work efficient.</span> --}}
                </li>
                <li class="col-12 pt-4">
                    <div class="mb-2">
                        <label class="form-label">Email address</label>
                        <input type="email" wire:model.lazy="email" class="form-control form-control-lg" placeholder="name@example.com">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </li>
                @if ($message)
                    <li class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Reset Password email has been sent.
                        </div>
                    </li>
                @endif
                <li class="col-12 mt-4 ">
                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase px-5 mr-4">Send Reset Link</button>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-block btn-dark lift text-uppercase ml-4 px-5">Back to Login</a>
                </li>
            </ul>
            <!--[ ul.row end ]-->
        </form>
    </div>
    <div class="col-xxl-4 col-xl-3 col-lg-12">
    </div>
</div>

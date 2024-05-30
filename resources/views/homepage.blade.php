<x-header_and_footer>
    <div class="container py-md-2">
        <div class="row align-items-center">
            <!--Left comment-->
            <div class="col-lg-7 py-3 py-md-5">
                <h1 class="display-3">Have you ever ridden a horse before?</h1>
                <p class="lead text-muted">
                    Welcome to our serene rural haven, where horseback riding beckons amidst whispering grass and open
                    trails. Whether you're a seasoned rider or just starting out, our tranquil atmosphere and expert
                    guidance promise an authentic equine experience. So, have you ever felt the thrill of riding before?
                    If not, let us introduce you to the magic of connecting with these majestic creatures amidst
                    nature's embrace.
                </p>
                <p class="lead text-muted">
                    {{$userCount}} riders have already signed up. Why not join them?
                </p>
            </div>
            <!--Registration form-->
            <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
                <form action="/register" method="POST" id="registration-form">
                    @csrf
                    <div class="form-group">
                        <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                        <input value = "{{ old('username') }}" name="username" id="username-register"
                            class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
                    </div>

                    @error('username')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                        <input value = "{{ old('email') }}" name="email" id="email-register" class="form-control"
                            type="text" placeholder="you@example.com" autocomplete="off" />
                    </div>

                    @error('email')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                        <input name="password" id="password-register" class="form-control" type="password"
                            placeholder="Create a password" />
                    </div>

                    @error('password')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm
                                Password</small></label>
                        <input name="password_confirmation" id="password-register-confirm" class="form-control"
                            type="password" placeholder="Confirm password" />
                    </div>

                    @error('password_confirmation')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up and ride</button>
                </form>
            </div>
        </div>
    </div>
</x-header_and_footer>

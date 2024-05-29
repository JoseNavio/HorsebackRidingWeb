<x-header_and_footer>
    <div class="container py-md-2">
        {{-- Go back --}}
        <p><small><strong><a href="/horses-page" style="color: #7e38B7;">Go back</a></strong></small></p>
        <div class="row align-items-center">
            <!--Left comment-->
            <div class="col-lg-7 py-3 py-md-5">
                <h1 class="display-3">Add a new horse...</h1>
                <p class="lead text-muted">
                    If you are looking to add a new horse to your stable, you have come to the right place. Here you can
                    register a new horse and start enjoying all the benefits of having a horse in your life.
                </p>
            </div>
            <!--Registration form-->
            <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5 mx-auto">

                <form action="/horse-register" method="POST" id="registration-form">
                    @csrf
                    {{-- Name --}}
                    <div class="form-group mb-2">
                        <label for="horse_name-register" class="text-muted mb-1"><small>Name</small></label>
                        <input value = "{{ old('horse_name') }}" name="horse_name" id="horse_name-register"
                            class="form-control" type="text" placeholder="Name of the horse" autocomplete="off" />
                    </div>

                    @error('horse_name')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- Breed --}}
                    <div class="form-group mb-2">
                        <label for="breed-register" class="text-muted mb-1"><small>Breed</small></label>
                        <input value = "{{ old('breed') }}" name="breed" id="breed-register" class="form-control"
                            type="text" placeholder="Enter the breed" autocomplete="off" />
                    </div>

                    @error('breed')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- gender --}}
                    <div class="form-group mb-2">
                        <label for="gender-register" class="text-muted mb-1"><small>Gender</small></label>
                        <input value = "{{ old('gender') }}" name="gender" id="gender-register" class="form-control"
                            type="text" placeholder="Male or female" autocomplete="off" />
                    </div>

                    @error('gender')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- age --}}
                    <div class="form-group mb-2">
                        <label for="age-register" class="text-muted mb-1"><small>Age</small></label>
                        <input value = "{{ old('age') }}" name="age" id="age-register" class="form-control"
                            type="text" placeholder="Enter the age" autocomplete="off" />
                    </div>

                    @error('age')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- is_sick --}}
                    <div class="form-group mb-2">
                        <label for="sick-register" class="text-muted mb-1"><small>Sick</small></label>
                        <input value = "{{ old('is_sick') }}" name="is_sick" id="sick-register" class="form-control"
                            type="text" placeholder="Is it currently sick" autocomplete="off" />
                    </div>

                    @error('is_sick')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- observations --}}
                    <div class="form-group mb-2">
                        <label for="observations-register" class="text-muted mb-1"><small>Observations</small></label>
                        <textarea name="observations" id="observations-register" class="form-control" placeholder="Any observation...">{{ old('observations') }}</textarea>
                    </div>

                    @error('observations')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Register a new
                        beast</button>
                </form>
            </div>
        </div>
    </div>
</x-header_and_footer>

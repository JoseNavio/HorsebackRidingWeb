<x-header_and_footer>
    <div class="container py-md-2">
        <div class="row align-items-center">
            <!--Left comment-->
            <div class="col-lg-7 py-3 py-md-5">
                <h1 class="display-3">Modify your ride</h1>
                <p class="lead text-muted">
                    Go ride and enjoy the beauty of nature. Book a ride now and experience the thrill of horse riding.
                </p>
            </div>
            <!--Registration form-->
            <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5 mx-auto">
                <form action="/booking/{{$booking->id}}" method="POST" id="update-form">
                    @method('PUT')
                    @csrf
                    {{-- Horse --}}
                    <div class="mb-6">
                        <label for="horse_id" class="block text-sm font-medium text-gray-700">Horse</label>
                        <select name="horse_id" id="horse_id-booking-register" class="form-control">
                            @forelse ($horses as $horse)
                                @if (!$horse->is_sick)
                                    <option value="{{ $horse->id }}"
                                        {{ old('horse_id', $booking->horse_id) == $horse->id ? 'selected' : '' }}>
                                        {{ $horse->horse_name }}
                                    </option>
                                @endif
                            @empty
                                <option>There are no horses yet...</option>
                            @endforelse
                        </select>
                    </div>

                    @error('horse_id')
                        <p class="m-0 small alert alert-danger shadow-sm">You must choose a horse.</p>
                    @enderror

                    {{-- Date --}}
                    <div class="form-group mb-2">
                        <label for="date" class="text-muted mb-1"><small>Date</small></label>
                        <input value="{{ old('date',$booking->date) }}" name="date" id="date-booking-register"
                            class="form-control" type="date" placeholder="Enter the date" autocomplete="off" />
                    </div>

                    @error('date')
                        <p class="m-0 small alert alert-danger shadow-sm">
                            @if ($message == 'validation.weekend')
                                We are just open Saturdays and Sundays.
                            @else
                                {{ $message }}
                            @endif
                        </p>
                    @enderror
                    {{-- //todo Check that the hour is not in the past --}}
                    {{-- hour --}}
                    <div class="form-group mb-2">
                        <label for="hour-booking-register" class="text-muted mb-1"><small>Hour</small></label>
                        <select name="hour" id="hour-booking-register" class="form-control">
                            <option value="">Select an hour</option>
                            <option value="10" {{ old('hour', $booking->hour) == '10' ? 'selected' : '' }}>10:00</option>
                            <option value="11" {{ old('hour', $booking->hour) == '11' ? 'selected' : '' }}>11:00</option>
                            <option value="12" {{ old('hour', $booking->hour) == '12' ? 'selected' : '' }}>12:00</option>
                            <option value="13" {{ old('hour', $booking->hour) == '13' ? 'selected' : '' }}>13:00</option>
                        </select>
                    </div>

                    @error('hour')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror

                    {{-- Comment --}}
                    <div class="form-group mb-2">
                        <label for="comment-register" class="text-muted mb-1"><small>Comment</small></label>
                        <textarea name="comment" id="comment-booking-register" class="form-control" placeholder="Any comment...">{{ old('observations', $booking->comment) }}</textarea>
                    </div>

                    @error('comment')
                        <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</x-header_and_footer>

<x-header_and_footer>

    @if (count($bookings) > 0)
        <div class="container py-md-5 container--narrow">
            <div class="text-center">
                <h2>Hello <strong>{{ auth()->user()->username }}</strong>, this are your bookings:</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-sm-6">
                    <div class="card m-4">
                        <div class="card-body d-flex flex-column">
                            <div class="row m-2">
                                <div class="row m-3">
                                    <p class="card-text"><strong>Horse:</strong> {{ $booking->horse->horse_name }}</p>
                                </div>
                                <div class="row m-3">
                                    <p class="card-text"><strong>Date:</strong> {{ $booking->date }}</p>
                                </div>
                                <div class="row m-3">
                                    <p class="card-text"><strong>Hour:</strong> {{ $booking->hour }}</p>
                                </div>
                                @if ($booking->comment !== null && $booking->comment !== '')
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Comment:</strong> {{ $booking->comment }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 2 == 0)
        </div>
        <div class="row">
    @endif
    @endforeach
    </div>
@else
    <div class="container py-md-5 container--narrow">
        <div class="text-center">
            {{-- Use the username --}}
            <h2>Hello <strong>{{ auth()->user()->username }}</strong>, you have no bookings yet.</h2>
            <p class="lead text-muted">Here you can see all your future reservation. If you don&rsquo;t have any,
                you
                can use the &ldquo;Book a ride&rdquo; feature in the top menu bar to find some adventures.</p>
        </div>
    </div>

    @endif

</x-header_and_footer>

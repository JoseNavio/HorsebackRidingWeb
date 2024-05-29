<x-header_and_footer>
    <div class="container py-md-5 container--narrow">
        <div class="text-center">
            <h2>Hello <strong>{{ auth()->user()->username }}</strong>,
                @if (count($bookings) > 0)
                    these are your bookings:
                @else
                    you have no bookings yet.
                @endif
            </h2>
        </div>
    </div>

    @if (count($bookings) > 0)
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-sm-6">
                    <div class="card m-3">
                        <div class="card-body d-flex flex-column">
                            <div class="row m-2">
                                <p class="card-text m-3"><strong>Horse:</strong> {{ $booking->horse->horse_name }}</p>
                                <p class="card-text m-3"><strong>Date:</strong> {{ $booking->date }}</p>
                                <p class="card-text m-3"><strong>Hour:</strong> {{ $booking->hour }}</p>
                                @if (!empty($booking->comment))
                                    <p class="card-text m-3"><strong>Comment:</strong> {{ $booking->comment }}</p>
                                @endif
                                <div class="row m-3 d-flex align-items-center justify-content-center">
                                    <form action="/booking/{{ $booking->id }}/edit" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Edit</button>
                                    </form>
                                </div>
                                <div class="row m-3 d-flex align-items-center justify-content-center">
                                    <form action="/booking-delete/{{ $booking->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container py-md-5 container--narrow">
            <div class="text-center">
                <p class="lead text-muted">
                    Here you can see all your future reservation. If you don&rsquo;t have any,
                    you can use the &ldquo;Book a ride&rdquo; feature in the top menu bar to find some adventures.
                </p>
            </div>
        </div>
    @endif
</x-header_and_footer>

<x-header_and_footer>
    <div class="container py-md-2">
        <div class="row align-items-start">
            <!--Horse info-->
            <div class="col-lg-12 py-3 py-md-5">
                <h1 class="display-3">{{ $horse->horse_name }}</h1>
                <p class="lead text-muted">
                    Here is the information about the horse.
                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card mb-4">
                            <div class="card-body d-flex flex-column">
                                <div class="row">
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Breed:</strong> {{ $horse->breed }}</p>
                                    </div>
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Gender:</strong> {{ $horse->gender }}</p>
                                    </div>
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Age:</strong> {{ $horse->age }}</p>
                                    </div>
                                    <div class="row m-3">
                                        <p class="card-text">
                                            <strong>Health:</strong>

                                            @if ($horse->is_sick == 1)
                                                Healthy
                                            @else
                                                Sick
                                            @endif
                                        </p>
                                    </div>
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Observations:</strong> {{ $horse->observations }}
                                        </p>
                                    </div>
                                    <div class="row m-3 d-flex align-items-center justify-content-center">
                                        <form action="/horse-delete/{{ $horse->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-header_and_footer>

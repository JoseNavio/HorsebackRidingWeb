<x-header_and_footer>
    <div class="container py-md-2">
        <div class="row align-items-start">
            <!--Horse list-->
            <div class="col-lg-12 py-3 py-md-5">
                <h1 class="display-3">Horses</h1>
                <p class="lead text-muted">
                    Here is a list of all the available horses.
                </p>
                <div class="row">
                    @foreach ($horses as $horse)
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <div class="card-body d-flex flex-column">
                                    <h2 class="card-title mb-auto">{{ $horse->horse_name }}</h2>
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
                                        <div class="row m-3 d-flex align-items-center justify-content-center">
                                            <a href="/horse-info/{{ $horse->id }}" class="btn btn-info">Open</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-header_and_footer>
<x-header_and_footer>
    <div class="container py-md-2">
        {{-- Go back --}}
        <p><small><strong><a href="/" style="color: #7e38B7;">Go back</a></strong></small></p>
        <div class="row align-items-start">
            <!--Horse list-->
            <div class="col-lg-12 py-3 py-md-5">
                <h1 class="display-3">Horses</h1>
                <div class="row m-2">
                    <p class="lead text-muted m-2">
                        Here is a list of all the horses in the stable.
                    </p>
                    <!--Create horse button-->
                    <a class="btn btn-sm btn-success m-2" href="/horse-form">Add horse</a>
                </div>
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

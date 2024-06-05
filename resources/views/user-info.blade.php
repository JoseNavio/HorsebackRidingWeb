<x-header_and_footer>
    <div class="container py-md-2">
        {{-- Go back --}}
        <p><small><strong><a href="/" style="color: #7e38B7;">Go back</a></strong></small></p>
        <div class="row align-items-start">
            <!--User info-->
            <div class="col-lg-12 py-3 py-md-5">
                <h1 class="display-3">{{ $user->username }}</h1>
                <p class="lead text-muted">
                    Here is your information.
                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card mb-4">
                            <div class="card-body d-flex flex-column">
                                <div class="row">
                                    <div class="row m-3">
                                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                    </div>
                                    <div class="row m-3">
                                        <p class="card-text">
                                            <strong>Role:</strong> 
                                            @if ($user->is_admin == 1)
                                                Admin
                                            @else
                                                User
                                            @endif
                                        </p>
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

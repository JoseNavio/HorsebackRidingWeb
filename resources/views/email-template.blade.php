<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Head</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('TEXT') }}
                        </div>
                    @endif
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>
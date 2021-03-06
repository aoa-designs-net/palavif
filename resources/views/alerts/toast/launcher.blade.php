<!-- Toast -->
@if (Session::has('success'))
    <div id="toast" class="toast alert-success" role="alert" aria-live="assertive" aria-atomic="true"
        style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        <div class="toast-header">
            {{-- <h5 class="mb-0"> SUCCESS!! </h5> --}}
            <small class="ml-auto">{{ now()->diffForHumans() }}</small>
            <button type="button" class="close ml-3" data-dismiss="toast" aria-label="Close">
                <i class="tio-clear" aria-hidden="true"></i>
            </button>
        </div>
        <div class="toast-body">
            {{ Session::get('success') }}
        </div>
    </div>
    <!-- End Toast -->

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{-- <i class="tio-warning mt-1 mr-1"></i> --}}
        <strong>Success!</strong> {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="tio-clear tio-lg"></i>
        </button>
    </div>

    @push('js')
        <script>
            $(document).on('ready', function() {
                // INITIALIZATION OF TOASTS
                // =======================================================
                $('#toast').toast({
                    delay: 1500,
                    // autohide: false
                });

                $('#toast').toast('show');
            });
        </script>
    @endpush
@endif

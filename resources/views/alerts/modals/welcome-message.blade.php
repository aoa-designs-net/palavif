<!-- Welcome Message Modal -->
<div class="modal fade" id="welcome-message-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-close">
                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal"
                    aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body p-sm-5">
                <div class="text-center">
                    {{-- <div class="w-75 w-sm-50 mx-auto mb-4">
                        <h5></h5>
                    </div> --}}

                    <h4 class="h1"> Congratulations {{ $user->name }} </h4>

                    <p> <strong> Welcome to Pafnation,</strong> the next generation for the world.</p>

                </div>
                <div class="text-left">
                    <p>... wishing you a great success as you connect, explore and achieve your desired financial
                        freedom. Enjoy your stay.</p>
                </div>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer d-block text-center py-sm-5">
                <div class="mx-auto">
                    <div class="row justify-content-between">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"
                                aria-label="Close">
                                <i class="tio-label"></i> Continue as a FREE USER
                            </button>
                        </div>
                        <div class="col">
                            <a class="btn btn-secondary btn-sm" href="{{route('dashboard.wallet.create')}}">
                                <i class="tio-category"></i> Upgrade to PREMIUM USER
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- End Welcome Message Modal -->

@prepend('js')
    <script>
        $(document).on('ready', function() {
            $('#welcome-message-modal').modal()
        });
    </script>
@endprepend

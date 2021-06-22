<div class="mb-lg-2">
    <a class="btn btn-white" href="{{route('dashboard.wallet.index')}}">
        <i class="tio-wallet mr-1"></i> Fund Wallet
    </a>
</div>

{{-- Card Overview --}}
<div id="overview" class="row">
    <div class="mb-3 mb-lg-5 col-sm-6 col-lg-4">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Wallet Balance</h6>
                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-5 text-dark" data-value="24">
                            &#8358;{{ format_money($wallet_balance['closing_balance'] ?? 0) }}</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Each Card -->
    </div>

    <div class="mb-3 mb-lg-5 col-sm-6 col-lg-4">
        <!-- Card -->
        <div class="card ">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Referral Earnings </h6>
                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-5 text-dark" data-value="24">
                            &#8358;{{ format_money(0) }}</span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Each Card -->
    </div>

    <div class="mb-3 mb-lg-5 col-sm-6 col-lg-4">
        <!-- Card -->
        <div class="card ">
            <div class="card-body">
                <h6 class="card-subtitle mb-2">Downline Count </h6>
                <div class="row align-items-center gx-2">
                    <div class="col">
                        <span class="js-counter display-5 text-dark" data-value="24"> 0 </span>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Each Card -->
    </div>
</div>


<!-- Card -->
<div class="card mb-3 mb-lg-5">
    <div class="card-body">
        <div id="feelings-trigger" class="input-group input-group-merge input-group-flush">
            <div class="input-group-prepend">
                <span class="input-group-text icon icon-circle">
                    <i class="tio-user-outlined"> </i>
                </span>
            </div>
            <input type="text" id="feelings-btn" class="form-control" placeholder=" Tell me how you feel"
                data-toggle="collapse" data-target="#collapseExample">
        </div>
        <div id="collapseExample" class="collapse">
            <!-- Quill -->
            <div class="quill-custom">
                <div class="js-quill" style="min-height: 2rem;" data-hs-quill-options='{
                            "placeholder": "How are you feeling?",
                                "modules": {
                                "toolbar": false
                                }
                            }'>
                </div>
            </div>
            <!-- End Quill -->
            <!-- Footer -->
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" id="feelings-discard" class="btn btn-white mr-2">Discard</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>

</div>
<!-- End Card -->



<!-- Sticky Block End Point -->
<div id="stickyBlockEndPoint"></div>


@push('js')
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF QUILLJS EDITOR
            // =======================================================
            var quill = $.HSCore.components.HSQuill.init('.js-quill');
            var quill = $.HSCore.components.HSQuill.init('.js-quill-step');

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            // INITIALIZATION OF HOW YOU FEEL
            $('#feelings-btn').on('click', function() {
                $('#feelings-trigger').toggle('d-none')
            });
            $('#feelings-discard').on('click', function() {
                $('#feelings-btn').trigger('click')
            });
        });
    </script>
@endpush

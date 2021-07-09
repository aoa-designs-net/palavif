@extends('layouts.client')

@section('title', 'Dashboard')

@section('head_card')
    <div class="content container-fluid" style="height: 25rem; padding-top:4rem;">
        <!-- Page Header -->
        <div class="page-header page-header-light page-header-reset">
            <div class="row align-items-center">
                <div class="col d-none d-sm-block">
                    <h1 class="page-header-title">
                        <a href="{{ route('dashboard.index') }}" class="text-white"> Dashboard </a>
                    </h1>
                </div>

                <div class="col-sm-auto col-md-auto col-lg-3">
                    <small class="text-cap text-white mb-2">Your referral code:</small>

                    <!-- Input Group -->
                    <div class="input-group">
                        <input id="referralCode" type="text" class="form-control bg-white" readonly
                            value="{{ $user->account->referral_link }}">
                        <div class="input-group-append">
                            <a class="js-clipboard btn btn-white" href="javascript:;" data-toggle="tooltip"
                                title="Copy to clipboard"
                                data-hs-clipboard-options='{ "type": "tooltip", "successText": "Copied!", "contentTarget": "#referralCode", "classChangeTarget": "#referralCodeIcon", "defaultClass": "tio-copy", "successClass": "tio-done" }'>
                                <i id="referralCodeIcon" class="tio-copy"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Input Group -->
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
    </div>
@endsection

@section('content')
    @includeUnless($user_wallet, 'alerts.modals.create-wallet')
    @includeWhen($new_registered_user, 'alerts.modals.welcome-message', ['user' => $user])
    {{-- Card Overview --}}
    <div id="overview" class="row">
        <div class="mb-3 mb-lg-5 col-sm-6 col-lg-6">
            <div class="card card-hover-shadow h-100" href="javascript:;">
                <div class="card-body">
                    <h6 class="card-subtitle">U-Wallet Balance</h6>
                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <span
                                class="card-title h2">&#8358;{{ format_money($user['wallet']['closing_balance'] ?? 0) }}</span>
                        </div>

                        <div class="col-6" style="height: 3rem;">
                        </div>
                    </div>
                    <!-- End Row -->

                    <a href="#">
                        <span class="badge badge-soft-success">
                            <i class="tio-visible-outlined text-body font-size-sm ml-1"></i> View all Transactions
                        </span>
                    </a>
                    <a href="{{ route('dashboard.wallet.index') }}">
                        <span class="badge badge-soft-success">
                            <i class="tio-wallet text-body font-size-sm ml-1"></i> Add Funds
                        </span>
                    </a><br>
                    {{-- <span class="text-body font-size-sm ml-1"> <em> Send money into your universal wallet for any transaction </em> </span> --}}
                </div>
            </div>

        </div>

        <div class="mb-3 mb-lg-5 col-sm-6 col-lg-6">
            <div class="card card-hover-shadow h-100" href="javascript:;">
                <div class="card-body">
                    <h6 class="card-subtitle"> Lifetime Earnings </h6>
                    <div class="row align-items-center gx-2 mb-1">
                        <div class="col-6">
                            <span class="card-title h2">&#8358;{{ format_money(0) }}</span>
                        </div>

                        <div class="col-6" style="height: 3rem;">
                        </div>
                    </div>
                    <!-- End Row -->

                    <a href="#">
                        <span class="badge badge-soft-success">
                            <i class="tio-visible-outlined text-body font-size-sm ml-1"></i> View all Earnings
                        </span>
                    </a><br>
                    {{-- <span class="text-body font-size-sm ml-1"> <em> Here you wil see all your total earnings since you joined us </em></span> --}}
                </div>
            </div>
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

@endsection
@push('js')
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF QUILLJS EDITOR
            // =======================================================
            var quill = $.HSCore.components.HSQuill.init('.js-quill');

            // INITIALIZATION OF HOW YOU FEEL
            // =======================================================
            $('#feelings-btn').on('click', function() {
                $('#feelings-trigger').toggle('d-none')
            });
            $('#feelings-discard').on('click', function() {
                $('#feelings-btn').trigger('click')
            });
        });
    </script>
@endpush

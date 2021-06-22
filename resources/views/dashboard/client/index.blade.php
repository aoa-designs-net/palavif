@extends('layouts.client')

@section('title', 'Dashboard')

@section('head_card')
    <div class="content container-fluid" style="height: 25rem; padding-top:4rem;">
        <!-- Page Header -->
        <div class="page-header page-header-light page-header-reset">
            <div class="row align-items-center">
                <div class="col d-none d-sm-block">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
                
                <div class="col-sm-auto col-md-auto col-lg-3">
                    <small class="text-cap text-white mb-2">Your referral code:</small>

                    <!-- Input Group -->
                    <div class="input-group">
                        <input id="referralCode" type="text" class="form-control bg-white" readonly
                            value="{{ $user->account->referral_link }}">
                        <div class="input-group-append">
                            <a class="js-clipboard btn btn-white" href="javascript:;" data-toggle="tooltip"
                                title="Copy to clipboard" data-hs-clipboard-options='{
                                                                  "type": "tooltip",
                                                                  "successText": "Copied!",
                                                                  "contentTarget": "#referralCode",
                                                                  "classChangeTarget": "#referralCodeIcon",
                                                                  "defaultClass": "tio-copy",
                                                                  "successClass": "tio-done"
                                                                 }'>
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
    <div class="content container-fluid" style="margin-top: -18rem;">
        @includeUnless($user_created_wallet, 'alerts.modals.create-wallet')

        <div class="row">
            <!-- Right Column SideBar -->
            @include('dashboard.client.sidebar.right')
            <!-- End Right Column SideBar -->

            <!-- Center Column SideBar -->
            <div class="col-lg-6">
                @include('dashboard.client.sidebar.center')
            </div>
            <!-- End of Center Column SideBar -->

            <!-- Left Column SideBar -->
            @include('dashboard.client.sidebar.left')
            <!-- End of Left Column SideBar -->
        </div>
        <!-- End Row -->
    </div>
@endsection
@push('js')
    <script>
        $(document).on('ready', function() {
            // 
        });
    </script>
@endpush

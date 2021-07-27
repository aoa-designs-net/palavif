@extends('layouts.client')

@section('title', 'Wallet Management')


@section('head_card')
    <div class="content container-fluid" style="height: 25rem; padding-top:4rem;">
        <!-- Page Header -->
        <div class="page-header page-header-light page-header-reset">
            <div class="row align-items-center">
                <div class="col d-none d-sm-block">
                    <h1 class="page-header-title">Wallet Management</h1>
                </div>

            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
    </div>
@endsection

@section('content')
    @if (empty($wallet))
        @prepend('css')
            <style>
                .invalid-feedback {
                    color: #7c4700;
                }

            </style>
        @endprepend
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                <h2 class="card-title h4">Fund Wallet </h2>
            </div>

            {{-- <div class="card-body">
                <h3>Transfer Fund into any account below </h3>
                @foreach ($wallet['virtual_accounts'] as $account)
                    <div class="row mt-2">
                        <label class="col-sm-3 col-form-label input-label"> Account Name
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="{{ $account['account_name'] }}">
                        </div>
                        <label class="col-sm-3 col-form-label input-label">{{ $account['bank_name'] }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" readonly value="{{ $account['account_number'] }}">
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="mt-2">
                    <div class="row">
                        <div class="col-1">
                            <i class="tio-done tio-xl"></i>
                        </div>
                        <div class="col-11">
                            <span class="d-block font-size-sm">
                                Your Wallet will be auto-credited as soon as the fund arrive any of the bank
                                accounts above. </span>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <form class="js-validate" id="init-top-up" action="" method="post">
                    @csrf
                    <div class="row mb-2">
                        <label class="col-sm-12 col-form-label input-label"> Enter Amount: </label>
                        <div class="col-sm-12 js-form-message">
                            <input required type="number" class="form-control" name="topup_amount"
                                placeholder="Enter Topup Amount">
                        </div>
                    </div>
                    <div class="input-group input-group-down-break">
                        <div class="form-control mb-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="paystack" name="payWith"
                                    id="payWithPaystack">
                                <label class="custom-control-label" for="payWithPaystack">Pay using Paystack</label>
                            </div>
                        </div>
                        <div class="form-control mb-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="flutterwave" name="payWith"
                                    id="payWithFlutterwave">
                                <label class="custom-control-label" for="payWithFlutterwave">Pay using Flutterwave</label>
                            </div>
                        </div>
                        <div class="form-control mb-2">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="dedicated_account" name="payWith"
                                    id="payWithDedicatedAccount" required checked>
                                <label class="custom-control-label" for="payWithDedicatedAccount">Pay using Dedicated
                                    Account</label>
                            </div>
                        </div>
                    </div>
                    <div class="row col-sm-12 mt-2">
                        <button class="btn btn-primary" id="btn-top-up" type="submit"> Submit </button>
                    </div>
                </form>
                {{-- <input type="number" name="" id=""> --}}
                {{-- <a onclick="event.preventDefault();" id="create-wallet" class="btn btn-primary">Pay Now</a> --}}
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modal-test" tabindex="-1" role="dialog"
            aria-labelledby="myTestModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="myTestModal"> Modal test </h5>
                    </div>
                </div>
            </div>
        </div>
        @prepend('js')
            <script>
                $(document).on('ready', function() {
                    // INITIALIZATION OF FORM VALIDATION
                    // =======================================================
                    $('.js-validate').each(function() {
                        $.HSCore.components.HSValidation.init($(this));
                    });

                    $('#btn-top-up').on('click', function(e) {
                        e.preventDefault();
                        let topUpForm = $('#init-top-up');
                        if (topUpForm.valid()) {
                            let radioSelected = $('input[name=payWith]:checked', '#init-top-up').val()
                            return payWithOptions(radioSelected);
                        }
                        return console.log('invalid');
                    });

                    function payWithOptions(option) {
                        switch (option) {
                            case 'dedicated_account':
                                $('#modal-test').modal()
                                break;

                            default:
                                break;
                        }
                    }
                });
            </script>
        @endprepend
    @else
        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                <h2 class="card-title h4">Create Wallet Account </h2>
            </div>
            <div class="card-body">
                <a onclick="event.preventDefault();" id="create-wallet" class="btn btn-primary">Create Wallet</a>
            </div>
        </div>


        {{-- @include('alerts.modals.create-wallet', ['banks' => \App\Models\BankList::all(), 'user' => auth()->user()]) --}}
        {{-- @prepend('js')
            <script>
                $(document).on('ready', function() {
                    $('#create-wallet').on('click', function() {
                        $('#create-wallet-modal').modal()
                    });
                });
            </script>
        @endprepend --}}

    @endif



@endsection

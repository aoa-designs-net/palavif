<div class="modal fade bd-example-modal-lg" id="staticBackdrop" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel"> Create Wallet Account </h5>
                <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal"
                    aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4" style="margin-top: -5%;">
                    <span class="d-block font-size-sm"> <i class="tio-done tio-xl" style="font-size: 0.75rem;"></i>
                        Wallet will allow auto-crediting of funds into your account. </span>
                    <span class="d-block font-size-sm"> <i class="tio-done tio-xl" style="font-size: 0.75rem;"></i>
                        Enter your correct bank account details as you can't change it again. </span>
                </div>
                <form class="js-validate" method="post" action="{{ route('wallet.create') }}">
                    @csrf
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Full Name </label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input readonly type="text" class="form-control"
                                    value="{{ $user->account->first_name ?? '' }}">
                                <input readonly type="text" class="form-control text-uppercase"
                                    value="{{ $user->account->last_name ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="bankNameLabel" class="col-sm-3 col-form-label input-label">Bank Name <i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top"
                                title=""
                                data-original-title="The name of the bank you would like to use when receiving payment from us"></i></label>
                        <div class="col-sm-9 js-form-message">
                            <select required class="js-select2-custom custom-select" id="bankNameLabel" name="bank_code"
                                size="1" data-hs-select2-options='{
                                            "placeholder": "Select a Bank",
                                            "searchInputPlaceholder": "Search for your bank"
                                            }'>
                                <option label="empty"></option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->code }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="accountNumberLabel" class="col-sm-3 col-form-label input-label">Account No. <i
                                class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top"
                                title=""
                                data-original-title="Your bank account number attached to the selected bank above"></i></label>

                        <div class="col-sm-9 js-form-message">
                            <input required type="tel" min="0" minlength="10" class="js-masked-input form-control"
                                name="account_number_bank" id="accountNumberLabel" data-rule-digits="true"
                                data-hs-mask-options='{
                                    "template": "000000000000"
                                  }' placeholder="Your Bank Account Number" aria-label="Your Bank Account Number"
                                value="">
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="row form-group d-none" id="resolved_name_div">
                        <label for="resolvedName" class="col-sm-3 col-form-label input-label"> Resolved Name
                        </label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input readonly type="text" id="resolved_name_input" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->

                    <div class="d-flex justify-content-end" id="create_wallet_div">
                        <button disabled id="create_wallet_btn" type="submit" class="btn btn-primary">Create
                            Wallet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<button id="create-wallet-modal" type="button" class="btn btn-primary d-none" data-toggle="modal"
    data-target="#staticBackdrop">
    Wallet
</button>
@push('css')
    <style>
        .invalid-feedback {
            color: #7c4700;
        }

    </style>
@endpush
@push('js')
    <script>
        document.querySelector("#create-wallet-modal").click();
        $(document).on('ready', function() {

            // INITIALIZATION OF FORM VALIDATION
            // =======================================================
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this));
            });
            // INITIALIZATION OF INPUT MASKS
            // =======================================================
            $('.js-masked-input').each(function() {
                $.HSCore.components.HSMask.init($(this));
            });

            $('#bankNameLabel').change(function() {
                let bank_selected = $(this).val();
                let account_number = $('#accountNumberLabel').val();
                if ($.isNumeric(account_number) && ($(this).hasClass('is-valid'))) {
                    return resolve_account(account_number, bank_selected);
                }
            });

            $('#accountNumberLabel').focusout(function() {
                let selected_bank = $('#bankNameLabel').val();
                let account_number = $(this).val();
                if ($.isNumeric(account_number) && ($(this).hasClass('is-valid'))) {
                    if (selected_bank.length < 1) {
                        return alert('Kindly select a bank');
                    }
                    return resolve_account(account_number, selected_bank);
                }
            });

            function resolve_account(account_number, selected_bank) {
                // Ajax Request witht the details to fetch paystack resolver
                $.ajax({
                    url: "{{ route('wallet.create') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "account_number_bank": account_number,
                        "bank_code": selected_bank
                    },
                    beforeSend: function() {
                        $('#create_wallet_div').html(
                            "<button id='create_wallet_btn' class='btn btn-primary' type='button' disabled><span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span> Verifying... </button>"
                        );
                    },
                    success: function(data) {
                        if (data.status == true) {
                            $('#resolved_name_input').val(data.data.account_name)
                            $('#resolved_name_div').removeClass('d-none')
                            $('#create_wallet_btn').removeAttr('disabled');
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON.message)
                        alert(error.responseJSON.message);
                    },
                    complete: function(e, status) {
                        if (status !== 'error') {
                            $('#create_wallet_div').html(
                                '<button id="create_wallet_btn" type="submit" class="btn btn-primary">Create Wallet</button>'
                            )
                        } else {
                            $('#create_wallet_div').html(
                                '<button id="create_wallet_btn" type="submit" class="btn btn-primary">Create Wallet</button>'
                            )
                        }

                    },
                });
            }
        });

    </script>
@endpush

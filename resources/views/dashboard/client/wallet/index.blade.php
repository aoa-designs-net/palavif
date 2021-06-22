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
    <div class="content container-fluid" style="margin-top: -18rem;">

        <div class="row">
            <!-- Right Column SideBar -->
            @include('dashboard.client.sidebar.right')
            <!-- End Right Column SideBar -->

            <!-- Center Column SideBar -->
            <div class="col-lg-6">
                <div class="card mb-3 mb-lg-5">
                    <div class="card-header">
                        <h2 class="card-title h4">Fund Wallet </h2>
                    </div>
                    <div class="card-body">
                        <h3>Transfer Fund into any account below </h3>
                        @foreach ($wallet['virtual_accounts'] as $account)
                            <div class="row mt-2">
                                <label for="phoneLabel"
                                    class="col-sm-3 col-form-label input-label">{{ $account['bank_name'] }} </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly
                                        value="{{ $account['account_number'] }}">
                                </div>
                            </div>
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
                    </div>


                </div>
            </div>
            <!-- End of Center Column SideBar -->

            <!-- Left Column SideBar -->
            @include('dashboard.client.sidebar.left')
            <!-- End of Left Column SideBar -->
        </div>
        <!-- End Row -->
    </div>
@endsection

@extends('layouts.auth')

@section('title', 'Register Using Email')

@section('content')
<div class="col-md-9 offset-md-2 offset-lg-1 offset-xl-1 space-top-2 space-lg-1">
    @yield('form')
</div>

@push('js')
<script>
    // CHECK IF USERNAME IS AVAILABLE
    $('#yourUsername').on('change', function() {
        // Check if class is-valid is present
        // Make Ajax Call to confirm Username
        console.log($(this));
    });

    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    $('.js-validate').each(function() {
        $.HSCore.components.HSValidation.init($(this), {
            rules: {
                confirmPassword: {
                    equalTo: '#userPassword'
                }
            }
        });
    });

    // INITIALIZATION OF MASKED INPUT
    // =======================================================
    $('.js-masked-input').each(function() {
        var mask = $.HSCore.components.HSMask.init($(this));
    });
</script>
@endpush

@endsection
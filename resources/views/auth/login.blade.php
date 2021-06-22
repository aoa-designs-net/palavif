@extends('layouts.auth')

@section('title', 'Email Login')

@section('content')
<div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-top-3 space-lg-0">
    @yield('form')
</div>

@push('js')
<script>
    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    $('.js-validate').each(function() {
        var validation = $.HSCore.components.HSValidation.init($(this));
    });

</script>

@endpush
@endsection

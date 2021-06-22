@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="col-md-9 offset-md-2 offset-lg-1 offset-xl-1 space-top-2 space-lg-1">
    @if(Session::has('status'))
    <x-alert message="Message Sent Successfully!!" />
    @endif
    <!-- Form -->
    <form class="js-validate" method="post" action="{{route('password.email')}}">
        @csrf
        <div class="text-center mb-5">
            <h1 class="display-5 text-cap">Find your account</h1>
            <p class="text-white">Please enter your email address to search for your account; or recover your account or reset your password.</p>
        </div>

        <!-- Form Group -->
        <div class="js-form-message form-group">
            <label class="input-label" for="resetPasswordSrEmail" tabindex="0">Your email</label>

            <input type="email" class="form-control form-control-lg" name="email" id="resetPasswordSrEmail" tabindex="1" placeholder="email@address.com" aria-label="email@address.com" required data-msg="Please enter a valid email address.">
        </div>
        <!-- End Form Group -->

        <button type="submit" class="btn btn-lg btn-block btn-palavif-primary">Submit</button>

        <div class="text-center mt-2">

            <a class="btn btn-link" href="{{route('login')}}">
                <i class="tio-chevron-left"></i> <span class="text-white">I have remembered my details, let me</span> Login
            </a>
        </div>
    </form>
    <!-- End Form -->
</div>
@endsection

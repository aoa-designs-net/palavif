@extends('auth.login')

@section('form')
<!-- Form -->
<form class="js-validate" action="{{route('login.email')}}" method="post">
    @csrf
    <!-- Title -->
    <div class="mb-5 mb-md-7">
        <h2 class="h2 text-primary" style="text-align: center"> <strong> Login to mingle! </strong> </h2>
        <p class="text-white" style="text-align: center">...new here and don't have an account? <a class="text-primary" href="{{route('register.social-media')}}">Register</a></p>
    </div>
    <!-- End Title -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
        <label class="input-label" for="signinUnique"><strong> Email or Username or Phone number </strong> </label>
        <input type="text" style="background-color: #79443b00;" class="form-control" name="username" id="signinUnique" tabindex="1" placeholder="Enter your Email, Username or Phone Number" aria-label="Enter your Email, Username or Phone Number" required data-msg="Please enter a valid email address or username or phone number." autofocus>
        @error('username')
        <x-alert :message="$message" />
        @enderror
    </div>
    <!-- End Form Group -->

    <!-- Form Group -->
    <div class="js-form-message form-group">
        <label class="input-label" for="signinSrPassword" tabindex="0">
            <span class="d-flex justify-content-between align-items-center">
                <strong> Password </strong>
                <a class="link-underline text-capitalize font-weight-normal" href="{{route('password.request')}}">Forgot Password?</a>
            </span>
        </label>
        <input type="password" style="background-color: #79443b00;" class="form-control" name="password" id="signinSrPassword" tabindex="2" placeholder="Enter your 8+ characters password" aria-label="Enter your 8+ characters password" required data-msg="Your password is invalid. Please try again.">
        @error('password')
        <x-alert :message="$message" />
        @enderror
    </div>
    <!-- End Form Group -->

    <!-- Button -->
    <div class="row align-items-center mb-5">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember_me" id="customCheck11" class="custom-control-input">
                <label class="custom-control-label text-white" for="customCheck11">Keep me signed In</label>
            </div>
        </div>

        <div class="col-sm-6 text-sm-right">
            <button type="submit" class="btn btn-primary transition-3d-hover">Login and Explore</button>
        </div>
    </div>
    <!-- End Button -->
</form>
<!-- End Form -->
@endsection

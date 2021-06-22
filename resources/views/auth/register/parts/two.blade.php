@extends('auth.register')

@section('form')
<!-- Form -->
<form class="js-validate" action="{{route('register.email.part.two.store')}}" method="post">
    @csrf
    <input type="hidden" name="form-part" value="{{$form_part}}">
    <div id="part-two">
        <input type="hidden" name="user" value="{{$user}}">
        <!-- Your Username -->
        <div class="js-form-message form-group">
            <label class="input-label" for="yourUsername"><strong> Your Username </strong>
            </label>
            <input type="text" class="form-control" minlength="5" name="your-username" id="yourUsername" placeholder="Choose your username" aria-label="Choose your username" data-msg="Please enter a valid username.">
            @error('your-username')
            <x-alert :message="$message" />
            @enderror
        </div>
        <!-- End Your Username -->

        <!-- Password and Confirm Password -->
        <div class="row form-group">
            <div class="col-md-6 js-form-message">
                <label id="password" class="input-label"> <strong> New Password </strong></label>
                <input type="password" name="password" minlength="8" class="form-control" id="userPassword" placeholder="*********" aria-label="Password must be atleast 8 Characters" required data-msg="Password must be atleast 8 Characters">
                @error('password')
                <x-alert :message="$message" />
                @enderror
            </div>
            <div class="col-md-6 js-form-message ">
                <label id="confirmPassword" class="input-label"><strong> Confirm Password </strong> </label>
                <input type="password" name="password_confirmation" minlength="8" class="form-control" id="confirmPassword" placeholder="*********" aria-label="Password do not match" required data-msg="Password do not match">
                @error('password_confirmation')
                <x-alert :message="$message" />
                @enderror
            </div>
            <div class="col-md-12">
                <div class="text-muted font-size-1 text-center">(Password must be at least 8 characters)</div>
            </div>
        </div>
        <!-- End Password and Confirm Password -->

        <!-- Location and Phone Number -->
        <div class="row form-group">
            <div class="col-md-6 js-form-message">
                <label id="user-location" class="input-label"> <strong> Location </strong></label>
                <select style="color: white; background-color: transparent; border-color: #7d4700a8;" class="form-control custom-select" name="location" id="user-location" required data-msg="Specify your location">
                    <option selected disabled value="0">Specify your Location</option>
                    <option value="nigeria">Nigeria</option>
                </select>
                @error('location')
                <x-alert :message="$message" />
                @enderror
            </div>
            <div class="col-md-6 js-form-message ">
                <label id="user-phone-number" class="input-label"><strong> Phone Number </strong> </label>
                <input type="text" name="userPhoneNumber" class="js-masked-input form-control" id="user-phone-number" placeholder="+234(xxx)xxx-xx-xx" aria-label="Enter your phone number" required data-msg="Enter your phone number" data-hs-mask-options='{
                            "template": "+234(000)000-00-00",
                            "clearIfNotMatch": true
                        }'>
                @error('userPhoneNumber')
                <x-alert :message="$message" />
                @enderror
            </div>
        </div>
        <!-- End Location and Phone Number -->

        <!-- Placer Username -->
        <div class="js-form-message form-group">
            <label class="input-label" for="placerUsername"><strong> Placer Username </strong></label>
            <input type="text" class="form-control" name="placer_username" id="placerUsername" placeholder="Enter your upline username" aria-label="Enter your placer username" data-msg="Please enter a valid username.">
            @error('placer_username')
            <x-alert :message="$message" />
            @enderror
        </div>
        <!-- End Placer Username -->

        <!-- Terms and Privacy -->
        <div class="row col-md-12 js-form-message form-group">
            <div class="form-check form-check-inline text-muted font-size-1">
                <input class="form-check-input" required name="accept_terms_privacy" type="checkbox" id="acceptTerms">
                @error('accept_terms_privacy')
                <x-alert :message="$message" />
                @enderror
                <label class="text-white" for="acceptTerms"><em> Creating an account means you are okay with our <a href="#"> Terms of Service </a> ,<br> <a href="#"> Privacy Policy </a> and our <a href="#"> Notification Settings </a>. </em></label>
            </div>
        </div>
        <!-- End Terms and Privacy -->

        <!-- Final Submit Button -->
        <div class="row align-items-center">
            <div class="col-sm-12 text-sm-right">
                <button type="submit" class="btn btn-primary btn-block transition-3d-hover">Signup and Explore</button>
            </div>
        </div>
        <!-- End  Final Submit Button -->

    </div>
</form>
<!-- End Form -->
@endsection

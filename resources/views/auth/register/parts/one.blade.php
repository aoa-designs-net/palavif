@extends('auth.register')

@section('form')
<!-- Form -->
<form class="js-validate" action="{{route('register.email.part.one.store')}}" method="post">
    @csrf
    <input type="hidden" name="form-part" value="{{$form_part}}">
    <div id="part-one">
        <!-- Title -->
        <div class="mb-3 mb-md-5">
            <h2 class="h2 text-primary" style="text-align: center"> <strong> Create account with email </strong> </h2>
            <p class="text-white" style="text-align: center">register using email address, it is very efficient and fast! </p>
        </div>
        <!-- End Title -->

        <!-- Sponsor Username -->
        <div class="js-form-message form-group">
            <label class="input-label" for="sponsorUsername"><strong> Sponsor Username </strong>
                {{-- <span class="form-check form-check-inline" style="display:inline-block; text-align: right; font-size: 11px; vertical-align: middle; padding-left: 10px;">
                    <input class="form-check-input" name="sponsor-availability" type="checkbox" id="sponsorCheck">
                    <label for="sponsorCheck"> Check if you do not have sponsor </label>
                </span> --}}
            </label>
            <input type="text" class="form-control" value="{{session('referrer') ?? ""}}" name="sponsor-username" id="sponsorUsername" placeholder="Enter your sponsor username" aria-label="Enter your sponsor username" data-msg="Please enter a valid username.">
            @error('sponsor-username')
            <x-alert :message="$message" />
            @enderror
        </div>
        <!-- End Sponsor Username -->

        <!-- Full Name -->
        <div class="row form-group">
            <label class="col-12 input-label" for="fullName"><strong> Your Full Name </strong>
                <span class="form-check form-check-inline" style="display:inline-block; text-align: right; font-size: 11px; vertical-align: middle; padding-left: 10px;">
                    Enter the name you use in real life
                </span>
            </label>
            <div class="col-6 js-form-message">
                <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter your first name" aria-label="Enter your first name" required data-msg="Please enter your first name.">
                @error('first-name')
                <x-alert :message="$message" />
                @enderror
            </div>
            <div class="col-6 js-form-message">
                <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter your last name" aria-label="Enter your last name" required data-msg="Please enter your last name.">
                @error('last-name')
                <x-alert :message="$message" />
                @enderror
            </div>
        </div>
        <!-- End Full Name -->

        <!-- Gender and Date of Birth -->
        <div class="row form-group">
            <div class="col-md-6 js-form-message">
                <label id="gender-select" class="input-label"> <strong> Gender </strong></label>
                <select style="color: white; background-color: transparent; border-color: #7d4700a8;" class="form-control custom-select" name="gender-select" id="gender-select" required data-msg="Please select your gender.">
                    <option selected disabled value="0">Specify your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Other</option>
                </select>
                @error('gender-select')
                <x-alert :message="$message" />
                @enderror
            </div>
            <div class="col-md-6 js-form-message ">
                <label id="date-of-birth" class="input-label"><strong> Date of Birth </strong> </label>
                <input type="date" name="date_of_birth" class="form-control" id="date-of-birth" placeholder="Day/Month/Year" aria-label="Select your date of birth" required data-msg="Please enter your date of birth.">
                @error('date_of_birth')
                <x-alert :message="$message" />
                @enderror
            </div>
        </div>
        <!-- End Gender and Date of Birth -->

        <!-- Email Address -->
        <div class="js-form-message form-group">
            <label class="input-label" for="email_address"><strong> Email Address </strong> </label>
            <input type="email" class="form-control" name="email_address" id="email_address" tabindex="1" placeholder="Enter your valid email dddress" aria-label="Enter your valid email dddress" required data-msg="Please enter a valid email address">
            @error('email_address')
            <x-alert :message="$message" />
            @enderror
        </div>
        <!-- End Email Address -->

        <!-- Button -->
        <div class="row align-items-center">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <span class="font-size-1 text-white">...already have an account?</span>
                <a class="font-size-1 font-weight-bold" href="{{route('login.social-media')}}">Login</a>
            </div>
            <div class="col-sm-6 text-sm-right">
                <button id="get-started" type="submit" class="btn btn-primary transition-3d-hover">Submit & Get Started</button>
            </div>
        </div>
        <!-- End Button -->
    </div>
</form>
<!-- End Form -->
@endsection

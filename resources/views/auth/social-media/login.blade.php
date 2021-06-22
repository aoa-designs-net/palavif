@extends('auth.social')

@section('form')
<!-- Title -->
<div class="mb-5 mb-md-7">
    <h2 class="h3 text-primary text-uppercase" style="text-align: center"><strong> Login To Access Your Account </strong> </h2>
    <p class="text-white" style="margin-top: -10px;">...new here and don't have an account? <a href="{{route('register')}}"> <strong> Register </strong></a></p>
</div>
<!-- End Title -->

<!-- Twitter & Facebook -->
<div class="row col-12">
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/facebook.svg')}}" alt="Facebook Logo"> </span>
            Facebook
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/twitter.svg')}}" alt="Twitter Logo"> </span>
            Twitter
        </a>
    </div>
</div>
<!-- End Twitter & Facebook -->

<!-- Google & Yahoo -->
<div class="row col-12 mt-2">
    <div class="col-6">
        <a class="btn btn-block btn-white" href="{{route('authentication.google')}}">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/google.svg')}}" alt="Google Logo"> </span>
            Google
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/yahoo.svg')}}" alt="Yahoo Logo"> </span>
            Yahoo
        </a>
    </div>
</div>
<!-- End Google & Yahoo -->

<!-- Instagram & Linkendin -->
<div class="row col-12 mt-2">
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/instagram.svg')}}" alt="Instagram Logo"> </span>
            Instagram
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/linkedin.svg')}}" alt="Linkedin Logo"> </span>
            Linkedin
        </a>
    </div>
</div>
<!-- End Instagram & Linkendin -->

<!-- Email & Apple -->
<div class="row col-12 mt-2">
    <div class="col-6">
        <a class="btn btn-block btn-white" href="{{route('login.email')}}">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/mail.svg')}}" alt="Email"></span>
            Email
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/apple.svg')}}" alt="Apple Logo"> </span>
            Apple
        </a>
    </div>
</div>
<!-- End Email & Apple -->

<!-- Microsoft & Pinterest -->
<div class="row col-12 mt-2">
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/microsoft.svg')}}" alt="Microsoft Logo"></span>
            Microsoft
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-block btn-white" href="#">
            <span class="float-left"> <img class="avatar avatar-xs mr-3" src="{{asset('backend/assets/svg/brands/pinterest.svg')}}" alt="Pinterest Logo"> </span>
            Pinterest
        </a>
    </div>
</div>
<!-- End Microsoft & Pinterest -->
@endsection

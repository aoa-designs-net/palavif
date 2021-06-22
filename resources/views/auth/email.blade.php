@extends('layouts.auth')

@section('title', 'Access Using Social Media')

@section('content')
<div class="col-md-8 col-lg-7 col-xl-6 offset-md-2 offset-lg-2 offset-xl-3 space-top-3 space-lg-0">
    <!-- Title -->
    <div class="mb-5 mb-md-7">
        <h2 class="h3 text-primary text-uppercase"><strong> Check Your email Account </strong> </h2>
        <p class="text-white" style="margin-top: -10px;"> An email was sent to <strong class="text-primary"> {{$user->email}} </strong>  </p>
        <p class="text-dark text-center" style="margin-top: -10px;"> Kindly click on the link in the email </p>
    </div>
    <!-- End Title -->
</div>
@endsection
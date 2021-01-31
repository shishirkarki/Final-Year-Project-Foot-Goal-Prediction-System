
@extends('layouts.app')

@section('content')
<div class="container">

  <!-- usercount -->
<div class="d-flex">
<div class="col-md-3">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <i class="fa fa-user fa-4x"></i>
                <h3 class="text-uppercase pt-3">Users</h3>
                <h2 class="">{{ $usercount }}</h2>
            </div>
        </div>
    </div>
    <!-- Postcount -->

    <div class="col-md-3">
        <div class="card bg-success">
            <div class="card-body text-center">
                <i class="fa fa-list fa-4x"></i>
                <h3 class="text-uppercase pt-3">
                <a href="/dashboard/posts/show">Posts</a></h3>
                <h2 class="">{{ $postcount }}</h2>
            </div>
        </div>
    </div>

<!-- Register request -->

    <div class="col-md-3">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <i class="fa fa-user fa-4x"></i>
                <h3 class="text-uppercase pt-3">
                <a href="/dashboard/approve">Users</a></h3>
                <h3 class="">Register Request</h3>
            </div>
        </div>
    </div>

<!-- Message send to user -->
    <div class="col-md-3">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <i class="fa fa-user fa-4x"></i>
                <h3 class="text-uppercase pt-3">
                <a href="/dashboard/notification">Message</a></h3>
                <h3 class="">Send Message</h3>
            </div>
        </div>
    </div>

    <!-- Message send to user -->
    <!-- <div class="col-md-3">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <i class="fa fa-user fa-4x"></i>
                <h3 class="text-uppercase pt-3">
                <a href="/dashboard/notification1">Message</a></h3>
                <h3 class="">Send Message</h3>
            </div>
        </div>
    </div> -->



    </div>
  

    
@endsection
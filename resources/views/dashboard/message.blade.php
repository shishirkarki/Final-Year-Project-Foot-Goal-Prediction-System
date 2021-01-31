
@extends('layouts.app')

@section('content')

<div id="Imageback123">
    <div class="container">
        <!-- Notification for post upload  -->
            @if (session('success_message'))
              <div class="alert alert-success">
                 {{ session('success_message') }}
               </div>
             @endif
<!-- end of Notification post upload  -->
        <div class="transbox">
               <center> <h1>Send message to user</h1></center>
               <!-- <center> <h2>Just For Entertainment...!</h2></center> -->
       <!-- message form start from here -->
    <center>
        <form action="/m" enctype="multipart/form-data" method="post">
        @csrf
        <label for="message" class="col-md-6 col-form-label"> <h1> Message </h1></label>                       
                <input id="message" name="message" type="text" 
                class="form-control @error('message') is-invalid @enderror" 
                message="message" value="{{ old('message') }}" 
                required autocomplete="message" autofocus>

        @error('message')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
            <br>
        @enderror 
            <div class="pt-2 mt-4">
                <button class="btn btn-primary">Send</button>
            </div>
        </form>
    </center> 
    <!-- end of message form -->
        </div>    

           <!-- sweet alert  -->
   @include('sweetalert::alert')
     <!-- sweet alert end -->

    </div>




    

    
  
@endsection
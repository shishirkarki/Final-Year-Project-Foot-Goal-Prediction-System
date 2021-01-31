@extends('layouts.app')

@section('content')
 

<div class="container">
<center><h1>| PHOTO |</h1></center>




       
        <div class="row pt-5">
        @foreach($user->posts as $post)
            @if($post->image)
            <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
              <img src="/storage/{{ $post->image }}" class="w-100"> 
            </a>
            </div>
            @endif  
           
        @endforeach
            
            
        </div>
    </div>
@endsection

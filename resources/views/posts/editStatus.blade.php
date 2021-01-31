@extends('layouts.app')

@section('content')
    
<div class="container">
<center>
    <form action="/posts1/{{ $post->id }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <label for="status" class="col-md-4 col-form-label"><h2>| Status |</h2></label>                       
            <input id="status" name="status" type="text" 
            class="form-control @error('status') is-invalid @enderror" 
            status="status" value="{{ old('status') ?? $post->status }}" 
            required autocomplete="status" autofocus>

     @error('status')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
     @enderror 
        <div class="pt-2">
            <button class="btn btn-primary">post</button>
        </div>
    </form>


    </center> 
</div>
@endsection

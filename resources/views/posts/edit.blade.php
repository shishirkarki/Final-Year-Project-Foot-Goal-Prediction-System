@extends('layouts.app')

@section('content')
 <!-- vallidation for search -->
 <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
<div class="container">
    <form action="/posts/{{ $post->id }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-8 offset-2">
        <div class="row">
            <h1>Edit Post</h1>
        </div>
        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">Post Caption</label>                       
                            <input id="caption" name="caption" type="text" 
                            class="form-control @error('caption') is-invalid @enderror" 
                            caption="caption"
                             value="{{ old('caption') ?? $post->caption }}" 
                             required autocomplete="caption" autofocus>

                            @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                        </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Post Image</label>

                <input type="file", class="form-control-file" 
                id="image" name="image"
                value="{{ old('image') ?? $post->image }}"
                required autocomplete="image" autofocus>
                @error('image')
                      
                             <strong>{{ $message }}</strong>
                       
                 @enderror   
            </div>
            <div class="row pt-4">
                <button class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

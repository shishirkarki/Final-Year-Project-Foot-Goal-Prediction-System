@extends('layouts.app')

@section('content')
<div class="search-container container">
    <h1>Search Results</h1>
    <p>result's for '{{ request()->input('query') }}'</p>

    @foreach($posts as $post)
    <div class="font-weight-bold">
                            <a href="/profile/{{ $post->id }}">
                                  <spam class="text-dark">{{ $post->name }} </spam>
                            </a> 
                        </div>
                        
        @endforeach
</div>
@endsection
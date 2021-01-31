@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-9"> 
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style= "max-width:50px;">
                    </div>
                    <div>
                    
                        <div class="font-weight-bold">  
                            <div class="d-flex align-items-baseline">  
                                <div class="pr-4 mr-3">                    
                                   <a href="/profile/{{ $post->user->id }}">
                                      <spam class="text-dark">{{ $post->user->name }} </spam>
                                     </a>  
                                  </div>  
                                  @if($post->image)  
                                            
                                     <div class="pl-5"><a href="/posts/{{ $post->id }}/edit">
                                     <button type="button" class="btn btn-light">Edit</button></a></div>
                                     <!-- <div class=""><a href="/detete/{{ $post->id }}" method="post">Delete</a></div> -->
                                     <form action="/delete/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                       
                                 @endif
                                 @if($post->status)  
                                                        
                                     <div class="pl-5 ml-4"><a href="/posts/{{ $post->id }}/editStatus">
                                     <button type="submit" class="btn btn-light">Edit</button></a></div>
                                     <form action="/deletestatus/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                        
                                 @endif
                                 
                            </div>    
                        </div>
                        
                    </div>
                </div>
                <hr>
                @if($post->status)
    <div class="col-5 pb-4">
         <a href="/p/{{ $post->id }}">
           <div class="col-md-10 w-100" style="background-color: #ADD8E6; height: 100; padding: 50px;"><br>
             <center><b>{{ $post->status}}</b></center><br> 
         </a>
         </div>
     </div>
         @endif 

         
                <p>{{ $post->caption }}</p>
            </div>
        </div>

        <div class="col-8">
        @if($post->image)
            <img src="/storage/{{ $post->image }}" class="w-50"> 
            </a>
            @endif
        </div>

    </div>
</div>
@endsection

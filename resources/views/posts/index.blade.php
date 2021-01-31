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
    <div class="row">


   <div class="shishirjung">

  

   <div class = "iconsss">
<!-- <a href = "#"><i class="fas fa-archive"></i></a> -->
<div class = "notification123">

  <div class = "notBtn" href = "#">
    <!--Number supports double digets and automaticly hides itself when there is nothing between divs -->
    
    <span class="notification--num">{{ $notifications->count()}}</span>
    
    <i class="fas fa-bell"></i>
      <div class = "box">
        <!-- <div class = "display"> -->
          <div class = "nothing"> 
            <!-- <i class="fas fa-child stick"></i> 
            <div class = "cent">Looks Like your all caught up!</div> -->
          </div>
          <div class = "cont"><!-- Fold this div and try deleting evrything inbetween -->
             <div class = "sec new">
             @foreach($notifications as $notification)   
             <a href="/prediction">
               <div class = "profCont">
               
               <img src="{{ $notification->user->profile->profileImage() }}" class="rounded-circle" style= "max-width:50px;">
              
                
               <div class = "txt"><spam class="text-dark">{{ $notification->user->name }}: {{ $notification->message}}</div>
              <div class = "txt sub">11/7 - 2:30 pm</div>
               </a>
            </div>
            @endforeach
             
            </div>
         </div>
        </div>
     </div>
     </div>
    </a>
</div>
</div>
   </div>








    @foreach($posts as $post)
    <div class="row py-4">
        <div class="col-6 offset-3"> 
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style= "max-width:50px;">
                    </div>
                    <div>
                    <div class="font-weight-bold">
                    <div class="d-flex align-items-baseline">  
                                <div class="pr-5 mr-4">                    
                                   <a href="/profile/{{ $post->user->id }}">
                                      <spam class="text-dark">{{ $post->user->name }} </spam>
                                     </a>  
                                  </div>  
                                  <!-- @if($post->image)                           
                                     <div class="pl-5"><a href="/posts/{{ $post->id }}/edit">
                                     <button type="button" class="btn btn-light">Edit</button></a></div> -->
                                     <!-- <div class=""><a href="/detete/{{ $post->id }}" method="post">Delete</a></div> -->
                                     <!-- <form action="/delete/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                 @endif -->
                                 <!-- Status edit, update and delete garnne -->
                                 <!-- @if($post->status)   
                                                         
                                     <div class="pl-5 ml-4"><a href="/posts/{{ $post->id }}/editStatus">
                                     <button type="submit" class="btn btn-light">Edit</button></a></div>
                                     <form action="/deletestatus/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                 @endif -->
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @if($post->status)
    
         <!-- <a href="/p/{{ $post->id }}"> -->
           <div class="col-md-10 w-100" style="background-color: #ADD8E6; height: 100; padding: 30px;"><br>
             <center><b>{{ $post->status}}</b></center><br> 
         <!-- </a> -->

     </div>
         @endif 
                
                <p>{{ $post->caption }}</p>
            </div>
        </div>

        <div class="col-8 offset-3">
            <a href="/profile/{{ $post->user->id }}">
            @if($post->image)
            <img src="/storage/{{ $post->image }}" class="w-50"> 
           @endif
            </a>        
        </div>
    </div>
    
    @endforeach
    <div class="row">
            <div class="col-12 d-flex justify-content-center">
            
                {{ $posts->links() }}
            </div>
        </div>
        </div>
</div>
@endsection

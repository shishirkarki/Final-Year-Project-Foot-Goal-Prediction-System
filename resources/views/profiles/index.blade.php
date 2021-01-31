@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-3 p-5">
                <img src="http://127.0.0.1:8000/svg/shishir.jpg" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div><h1>Footgoal</h1></div>
            <div class="d-flex">
                <div class="pr-4"><strong>2 posts</strong></div>
                <div class="pr-4">Photo</div>
            </div>
            <div class="pt-4 font-weight-bold">Footgoal</div>
            <div>We are nepali</div>
            <div><a href="#">Footgoal@gmail.com</a></div>
        </div>
    </div>
</div> -->

<!-- Notification for post upload  -->
@if (session('success_message'))
              <div class="alert toast_success">
                 {{ session('success_message') }}
               </div>
             @endif
<!-- end of Notification post upload  -->

<div class="row justify-content-center">
            <div class="col-md-12 mt-1">
               <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes /svg/footgoal.jpg-->
              <div class="widget-user-header text-white" style="background-image:url('/svg/user-cover.jpg')">
                 <h3 class="widget-user-username">{{ $user->name }}</h3>
                 
                 
                    <!-- <h5 class="widget-user-desc">Shishir</h5> -->
                    
              </div>
              <div class="widget-user-image">
                <!-- <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar"> -->
                <div class="col-6">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50">
                  <div class="pt-2 pl-4">
                      @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit"><h5><FONT COLOR="white">Edit Profile</FONT></h5></a> 
                      @endcan
                  </div>
                
        </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{ $user->posts->count() }}</h5>
                      <span class="description-text">Posts</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <!-- <h5 class="description-header">Description</h5> -->
                      <span class="description-text">{{ $user->profile->description }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <!-- <h5 class="description-header">Description</h5> -->
                      <span class="description-text">
                      <a href="/profile/{{ $user->id }}/pic">Photo</a>
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <!-- <h5 class="description-header">35</h5> -->
                      <span class="description-text">
                      @can('update', $user->profile)
                      <a href="/p/create">Add New Post</a></span>
                      @endcan
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

<!-- <div class="container">
<div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
</div> -->





<!-- Start form start -->
<div class="container">    

<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Add News</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">My Posts</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                 
                    <h3 class="text-center">Post News</h3>


    <!-- status form start from here -->
    <center>
    <form action="/s" enctype="multipart/form-data" method="post">
    @csrf
    <label for="status" class="col-md-4 col-form-label"><h2>| Status |</h2></label>                       
            <input id="status" name="status" type="text" 
            class="form-control @error('status') is-invalid @enderror" 
            status="status" value="{{ old('status') }}" 
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
    <!-- end of status form -->
                  </div>
                   
  <div class="tab-pane active show" id="settings">
  

                    <!-- status display in profile -->

    <div class="row pt-5">
    @foreach($user->posts as $post)
    @if($post->status)
    <div class="container">
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
                                        @if($post->status)  
                                        @can('update', $user->profile)                         
                                     <div class="pl-5 ml-4"><a href="/posts/{{ $post->id }}/editStatus">
                                     <button type="submit" class="btn btn-light">Edit</button></a></div>
                                     <form action="/deletestatus/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                        @endcan
                                 @endif



                                
                      
                    
                                 
                            </div> 
                        </div>
                    </div>
                </div>
                <hr>
               
    
         <!-- <a href="/p/{{ $post->id }}"> -->
           <div class="col-md-10 w-100" style="background-color: #ADD8E6; height: 100; padding: 30px;"><br>
             <center><b>{{ $post->status}}</b></center><br> 
         <!-- </a> -->

     </div>     
            </div>
        </div>
    </div>
    
    </div>    
         @endif 
     @endforeach
     <!-- status display in profile end  -->
       <!-- sweet alert  -->
       @include('sweetalert::alert')
     <!-- sweet alert end -->

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>




            
            </div>
        </div>
    </div>

</div>
@endsection

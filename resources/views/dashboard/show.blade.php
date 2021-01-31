@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Notification for post upload  -->
@if (session('success_message'))
              <div class="alert alert-success">
                 {{ session('success_message') }}
               </div>
             @endif
<!-- end of Notification post upload  -->
<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class=" text-primary">
                            <tr>
                                <th>id</th>
                                <th> User_id </th>
                                <th>Caption</th>
                                <th>status</th>
                                <th>image</th>
                                <th>Delete</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                           @foreach($posts as $post)
                            <tr>
                                <td>
                                   {{$post->id}}
                                </td>
                                <td>
                                    {{$post->user->id}}
                                </td>
                                <td>
                                   {{$post->caption}}
                                </td>
                                <td>
                                {{$post->status}}
                                </td>
                                <td>
        
                                <img src='/storage/{{ $post->image }}' height="60" width="60" class='img-responsive' alt="there is no post image"> 
                                </td>
                                <td>
                                <form action="/deleteuserpost/{{$post->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                       
                                        <button type="submit" class="btn btn-light">Delete</button>
                                </td>
                                   
                            @endforeach    
         <!-- sweet alert  -->
       @include('sweetalert::alert')
     <!-- sweet alert end -->

</div>
                                

</div>
@endsection
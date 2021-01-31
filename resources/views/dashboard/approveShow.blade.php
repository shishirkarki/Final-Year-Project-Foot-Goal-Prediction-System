@extends('layouts.app')

@section('content')
<div class="container">
@if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
<!-- register request -->
<table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>@if($user->status == 0) Inactive @else Active @endif</th>
                                <th><a href="{{ route('status', ['id'=>$user->id]) }}">@if($user->status == 1) Inactive @else Active @endif</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               
</div>
@endsection

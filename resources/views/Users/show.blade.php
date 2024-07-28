@extends('Users.layouts')
@section('content')
<div class="card">
    <div class="card-header"> contact us</div>
    <div class="card-body">
        <div class="card-body">
            <p class="card-title">Title: {{$user->title}}</p>
            <p class="card-title">Content: {{$user->content}}</p>
           
        </div>
    </div>
</div>
@endsection()

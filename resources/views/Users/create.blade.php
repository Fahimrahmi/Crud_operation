@extends('Users.layouts')
@section('content')

<div class="d-flex flex-row align-items-center p-3 px-md-4 bg-light border-bottom shadow-sm mb-3">
    <div class="mr-auto">
        <a class="p-2 text-dark" href="{{ url('/User') }}">Home</a>
        <a class="p-2 text-dark" href="{{ url('/User/create') }}">User Info</a>
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
        @guest
            @if (Route::has('register'))
                <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
            @endif
            <a class="p-2 text-dark" href="{{ route('authenticate') }}">Login</a>
        @else
            <a class="p-2 text-dark" href="{{ route('logout') }}">Logout</a>
            @csrf
            @method('POST')
        @endguest
    </nav>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">Contact Us</div>
    <div class="card-body p-4">
        <form action="{{ route('User.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Name</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="content">Content</label>
                <input type="text" name="content" id="content" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>

@endsection

@extends('./Users.layouts')
@section('title', 'App')
@section('content')

<style>
    .navbar {
        background-color: #f8f9fa; /* Light background color */
        border-bottom: 1px solid #e0e0e0; /* Light border color */
        box-shadow: 0 4px 6px -6px #222; /* Light shadow */
    }
    .navbar h1 {
        color: #343a40; /* Dark text color */
    }
    .navbar a {
        color: #007bff; /* Link color */
        text-decoration: none;
    }
    .navbar a:hover {
        text-decoration: underline;
    }
    .content {
        margin-top: 10px;
    }
    .success-message {
        color: #28a745; /* Green text color */
        font-weight: bold;
    }
</style>

<div class="d-flex flex-row align-items-center p-3 px-md-4 navbar mb-3">
    
    <div class="mr-auto">
        <a class="p-2" href="{{ url('/User') }}">Home</a>
        <a class="p-2" href="{{ url('/User/create') }}">AddPost</a>
    </div>
    <nav class="my-2 my-md-0 mr-md-3">
        @guest
            @if (Route::has('register'))
                <a class="p-2 float-right" href="{{ route('register') }}">Register</a>
            @endif
            <a class="p-2 float-right" href="{{ route('authenticate') }}">Login</a>
        @else
            <a href="{{ route('logout') }}">Logout</a>
            @csrf
            @method('POST')
        @endguest
    </nav>
</div>

<div class="content">
    <h1 class="text-center success-message">
        Successfully created
    </h1>
</div>

@endsection




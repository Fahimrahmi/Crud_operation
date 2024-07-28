@extends('Users.layouts')
@section('title' , 'indexPage')
@section('content')
<div class="d-flex flex-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">

  
    <div class="mr-auto">
      <a class="p-2 text-dark" href="{{ url('User') }}">Home</a>
      <a class="p-2 text-dark" href="{{ url('/User/create') }}">AddPost</a>
    </div>
     <nav class="my-2 my-md-0 mr-md-3">
      @guest
  @if (Route::has('register'))
     <a class="p-2 text-dark float-right" href="{{ route('register') }}">Register</a>
     @endif

     <a class="p-2 text-dark  float-right" href="{{ route('authenticate') }}">Login</a>
  @endguest
  @auth
<form action={{route('logout')}} method="POST">
   <a href="{{ route('logout') }}">Logout({{Auth::user()->name}})</a>
    @csrf
    @method('POST')
  </form>
   @endauth

  </nav>
</div>
<div class="container">
     <table class="table">
             <a href="{{url('/')}}" class="btn btn-danger btn-sm mr-2 mb-2 float-right" title="new content">Back</a>
            <a href="{{url('User/create')}}" class="btn btn-success btn-sm mr-2 mb-2 float-right" title="new content">ADD</a>
        <thead>
            <tr>
              <th>Name</th>
              <th>Content</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>

          <tbody>

            @foreach($user as $users)

            <tr>
              <td class="align-middle">{{ $users->title }}</td>
              <td class="align-middle">{{ $users->content }}</td>
              

              @if (Auth::user())
                  
              @endif

                
              <td class="align-middle">
                <a href="{{ url('/User/'.$users->id.'/edit') }}">
                  <button class="btn btn-success btn-sm">Edit</button>
                </a>
              </td>
              {{-- <td class="align-middle">
                <a href="{{ url('User/'.$users->id) }}">
                    <button class="btn btn-primary btn-sm">View</button>
                  </a>
              </td> --}}
              <td class="align-middle">
                <form method="POST" action="{{ url('/User/'.$users->id) }}">
                    {{method_field('Delete')}}

                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Confirm delete?')">
                    Delete
                  </button>
                </form>
              </td>

            </tr>

            @endforeach
          </tbody>

    </table>
</div>

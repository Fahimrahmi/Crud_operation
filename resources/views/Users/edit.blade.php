@extends('Users.layouts')
@section('content')

<div class="d-flex flex-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">


    <div class="mr-auto">
      <a class="p-2 text-dark" href="{{ url('/User') }}">Home</a>
      <a class="p-2 text-dark" href="{{ url('/User/create') }}">AddPost</a>
    </div>
     <nav class="my-2 my-md-0 mr-md-3">
      @guest
  @if (Route::has('register'))
     <a class="p-2 text-dark float-right" href="{{ route('register') }}">Register</a>
     @endif

     <a class="p-2 text-dark  float-right" href="{{ route('authenticate') }}">Login</a>
  @else
   <a href="{{ route('logout') }}">Logout</a>
    @csrf
    @method('POST')
  </form>


  @endguest

  </nav>

</div>
<div class="card">
  <div class="card-header">Contact Us</div>
  <div class="card-body">
      <form action="{{ url('/User/' . $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PATCH")
          <input type="hidden" name="id" id="id" value="{{ $user->id }}"><br>
          <label>Title</label><br>
          <input type="text" name="title" id="title" class="form-group" value="{{ $user->title }}"><br>
          <label>Content</label><br>
          <input type="text" name="content" id="content" class="form-group" value="{{ $user->content }}"><br>
         
          <input type="submit" value="Update" class="btn btn-success">
      </form>
  </div>
</div>





@endsection()

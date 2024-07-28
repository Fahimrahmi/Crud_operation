@extends('./Users.layouts')
@section('title', 'Login')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-primary text-white p-4 rounded">
                <form method="POST" action="{{route('authenticate')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Enter email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('email') }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}">
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>
                                {{ $errors->first('password') }}
                            </strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn  btn-primary">Login!</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

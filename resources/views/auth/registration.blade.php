@extends('frontend.front_master')

@section('title')
    {{ 'Registration Page' }}
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Register Here</h4>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                             <div class="alert alert-success">
                                <p>{{ session('message') }}</p>
                             </div>
                        @endif
                        <form action="{{ route('post.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name<span class="text-danger">*</span> </label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span> </label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Password<span class="text-danger">*</span> </label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""> Confirm Password<span class="text-danger">*</span> </label>
                                <input type="password" name="confirm-password" class="form-control">
                                @error('confirm-password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <input type="submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>

                        <p>Already have an account? Login  from
                            <a href="{{ route('login') }}">Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

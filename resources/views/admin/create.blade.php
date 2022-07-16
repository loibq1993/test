@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bg-white">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mb-3">
                    <label for="fullname">Full name</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Your full name" name="fullname" value="{{ old('fullname') }}">
                </div>
                <input type="hidden" name="type" value="{{ old('type', $type) }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

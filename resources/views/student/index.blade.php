@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mentors as $mentor)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$mentor->name}}</td>
                            <td>{{$mentor->email}}</td>
                            <td><a class="btn btn-success" href="{{route('student.mentors.show', $mentor->mentor_id)}}">Show</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

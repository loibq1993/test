@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Mentors</h2>
            <table class="table table-striped mentors">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        <a class="btn btn-success" href="{{route('mentor.create')}}">Create</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($mentors as $key => $mentor)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$mentor->name}}</td>
                        <td>{{$mentor->email}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('student.list', $mentor->id)}}">Show</a>
                            <form action="{{route('user.delete', $mentor->id)}}" method="post" style="display: inline-flex">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                            <a class="btn btn-warning">Assign student</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h2 class="mt-5">Student</h2>
            <table class="table table-striped student">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        <a class="btn btn-success" href="{{route('student.create')}}">Create</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $key => $student)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route('mentor.list', $student->id)}}">Show</a>
                            <form action="{{route('user.delete', $student->id)}}" method="post" style="display: inline-flex">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                            <a class="btn btn-warning">Assign mentor</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

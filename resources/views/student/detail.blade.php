@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container bootstrap snippets bootdey">
                <div class="panel-body inf-content">
                    <div class="row">
                        <div class="col-md-4">
                            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario">
                            <ul title="Ratings" class="list-inline ratings text-center">
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <strong>Information</strong><br>
                            <div class="table-responsive">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                                Identificacion
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->id}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-user  text-primary"></span>
                                                Name
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                                Role
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->roles[0]->description}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-envelope text-primary"></span>
                                                Email
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                created
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->created_at}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                Modified
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            {{$user->updated_at}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

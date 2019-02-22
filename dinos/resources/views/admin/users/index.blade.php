@extends('layouts.layout')
@section('content')
    <div class="col-md-12">
        <table class="table table-dark">
            <tr>
                <th>Name</th>
                <th>Admin</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Register at</th>
                <th>Delete</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->admin}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{count($user->comments)}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                        {!! Form::submit('X', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
@endsection
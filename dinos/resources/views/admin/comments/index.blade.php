@extends('layouts.layout')
@section('content')
    <div class="col-md-12">
        <table class="table table-dark">
            <tr>
                <th>User</th>
                <th>Content</th>
                <th>Comment replies</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{count($comment->replies)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCommentsController@destroy', $comment->id]]) !!}
                        {!! Form::submit('X', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
@endsection
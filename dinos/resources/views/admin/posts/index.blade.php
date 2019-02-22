@extends('layouts.layout')
@section('content')
    <div class="col-md-12">
<table class="table table-dark">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Weight</th>
            <th>Description</th>
            <th>Comments</th>
            <th>Image</th>
            <th>Created at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->name}}</td>
            <td>{{$post->type}}</td>
            <td>{{$post->weight}}</td>
            <td>{{str_limit($post->description, 50)}}</td>
            <td>{{count($post->comments)}}</td>
            <td><img src="{{$post->image ? $post->image->image_name : '/images/no.png'}}" width="50" height="35"></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td><a href="{{route('admin.posts.edit', ['id' => $post->id])}}"><button class="btn btn-info">EDIT</button></a></td>
            <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                {!! Form::submit('X', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>

        </tr>
        @endforeach

</table>
    </div>
@endsection
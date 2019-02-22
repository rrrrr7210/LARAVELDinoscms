@extends('layouts.layout')

@section('content')

    <div class="card-body col-md-4 fels rounded">
        <ul class="offset-sm-1 list-group">
            <li class="list-group-item" style="background-color: #6f42c1"><input type="text" id="search" placeholder="Search" name="search" ></li>
            <div id="eredmeny"></div>
        </ul>
    </div>
    <div class="card-body col-md-7 col-sm-3 post">
        <h2 class="card-title text-center">{{$post->name}}</h2>
            <div class="d-flex p-3 head rounded">
            <img class="rounded" id="dinoImg" src="{{$post->image ? $post->image->image_name : '/images/no.png'}}"  height="40%" width="50%" alt="">
                <div class="offset-sm-1"><h3>Attributes :</h3>
                <h4>Type : {{$post->type}}</h4>
                <h4>Weight : {{$post->weight}} tonne </h4></div>
            </div>
        <h4>{{$post->description}}</h4>
        <div>
        <div class="card-header col-md-12 comtitle rounded mt-5">
            <div class="row">
                <div class="col-md-9"><h3>COMMENTS</h3></div>
            </div>
            @auth
                {!! Form::open(['method' => 'POST', 'action' => 'CommentsController@store']) !!}

                {!! Form::textarea('content', null, ['class' => 'w-100', 'size' => '30x1']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">

                {!! Form::submit('Add Comment', ['class' => 'btn btn-info font-weight-bold']) !!}

                {!! Form::close() !!}
            @endauth
        </div>
            <div class="com rounded ">
                @foreach($comments as $comment)
                    @if($comment->post_id === $post->id)
                        <hr>
                        <div class="pr-2 ml-2">
                            <div class="float-right"><h6>{{$comment->created_at->diffForhumans()}}</h6></div>
                            <div class="row">
                                <div class="col-md-1 m-md-2"><h6 style="
                                @auth
                                    {{$comment->user->name == $user->name ? 'color: #6f42c1; font-weight: bold' : 'color: #5bc0de; font-weight: bold'}}
                                @endauth
                                            ">{{$comment->user->name}}</h6></div>
                                <div class="col-md-9 ml-lg-5"><h4>{{$comment->content}}</h4></div>
                            </div>
                        </div>
                        @foreach($commentsreplies as $commentreply)
                            @if($commentreply->comment_id === $comment->id)

                                <div class="ml-lg-5">
                                    <hr>
                                    <div class="float-right"><h6>{{$commentreply->created_at->diffForhumans()}}</h6></div>
                                    <div class="row">
                                        <div class="col-md-1 m-md-2"><h6 style="
                                        @auth
                                            {{$commentreply->user->name == $user->name ? 'color: #6f42c1' : 'color: black'}}
                                        @endauth
                                                    ">{{$commentreply->user->name}}</h6></div>
                                        <div class="col-md-9 ml-lg-5"><h5>{{$commentreply->content}}</h5></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @auth
                            <div class="ml-lg-5 mr-lg-5 pb-3">
                                {!! Form::open(['method' => 'POST', 'action' => 'RepliesController@store']) !!}

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                               <div class="row">
                                   {!! Form::submit('Add Reply', ['class' => 'btn btn-info font-weight-bold mr-2']) !!}
                                   {!! Form::text('content', null, ['class' => 'comInput w-50 pl-5']) !!}
                               </div>

                                {!! Form::close() !!}
                            </div>
                        @endauth
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@stop
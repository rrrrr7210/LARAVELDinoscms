@extends('layouts.layout')
@section('content')
    <div class="card-body text-center col-md-5 mt-5" id="image_preview">
        <div id="message"></div>
        <img class="mt-5 rounded" id="previewing" src="{{asset('images/no.png')}}" width="300" height="240" />
    </div>
    <div class="card-body text-center col-md-6 ml-lg-5">
        <h1>Create Post</h1>
        <div>
            {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
            <div class="form-group d-inline-block">
                {!! Form::text('name', null, ['class' => 'form-control text-center', 'placeholder' => 'Name:']) !!}
            </div>
            <div class="form-group d-inline-block">
                {!! Form::label('type', 'Type:') !!}
                {!! Form::select('type', array('Omnivores' => 'Omnivores', 'Herbivores' => 'Herbivores', 'Carnivores' => 'Carnivores'), 0, ['class' => 'form-control text-center']) !!}
            </div>
            <div class="form-group d-inline-block">
                {!! Form::text('weight', null, ['class' => 'form-control text-center', 'placeholder' => 'Weight(Tonne):']) !!}
            </div>
            <div class="form-group d-inline-block">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group d-inline-block">
                {!! Form::label('file', 'Image:') !!}
                {!! Form::file('file', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group d-inline-block">
                {!! Form::submit('Create Post', ['class' => 'btn btn-success m-md-2', 'name' => 'upload']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@endsection
